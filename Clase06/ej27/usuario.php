<?php
/*
Aplicación No 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato
con la fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer
el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.
*/

class Usuario
{
    public $_id;
    public $_nombre;
    public $_apellido;
    public $_clave;
    public $_mail;
    public $_fechaRegistro;
    public $_localidad;

    public function __construct($_nombre, $_apellido, $_clave, $_mail, $_localidad, $_id = null, $_fechaRegistro = null)
    {
        $this->_id = $_id == null ? $_id = $this->generarId() : $_id;
        $this->_nombre = $_nombre;
        $this->_apellido = $_apellido;
        $this->_clave = $_clave;
        $this->_mail = $_mail;
        $this->_localidad = $_localidad;
        $this->_fechaRegistro = $_fechaRegistro == null ? $_fechaRegistro = date("Y-m-d") : $_fechaRegistro;
    }

    private function generarId()
    {
        return random_int(1, 10000);
    }

    static function mostrarUsuario(Usuario $usuario)
    {
        /*
            <ul>
                <li>Coffee</li>
                <li>Tea</li>
                <li>Milk</li>
            </ul>
        */
        $stringUsuario = "<ul> <li>ID: " . $usuario->_id  . "</li>";
        $stringUsuario .= "<li>Nombre: " . $usuario->_nombre . "</li>";
        $stringUsuario .= "<li>Apellido: " . $usuario->_apellido . "</li>";
        $stringUsuario .= "<li>Clave: " . $usuario->_clave . "</li>";
        $stringUsuario .= "<li>Mail: " . $usuario->_mail  . "</li>";
        $stringUsuario .= "<li>Fecha registro: " . $usuario->_fechaRegistro  . "</li> </ul>";
        return $stringUsuario;
    }

    public static function leerjson($path)
    {
        $archivo = fopen($path, "r");
        $usuarios = array();
        if (filesize($path) > 0) {
            $texto = fread($archivo, filesize($path));
            $usuarios = json_decode($texto, false);
        } else {
            echo "El archivo está vacío";
        }
        fclose($archivo);
        return $usuarios;
    }

    public static function hacerjson($path, $usu)
    {
        $archivo = fopen($path, "w");

        fwrite($archivo, json_encode($usu));

        fclose($archivo);
    }

    public function equals($usuario)
    {
        if (
            $this->_clave == $usuario->_clave
            && $this->_mail == $usuario->_mail
        ) {
            return true;
        }

        return false;
    }

    // “Verificado” si el usuario existe y coincide la clave también.
    // “Error en los datos” si esta mal la clave.
    // “Usuario no registrado si no coincide el mail“
    public function verificarUsuario($listaUsuarios)
    {
        foreach ($listaUsuarios as $usuario) {
            if ($this->equals($usuario)) {
                return "Verificado";
            } else if ($this->_mail == $usuario->_mail) {
                return "Error en los datos";
            }
        }
        return "Usuario no registrado";
    }

    public static function recibirUsuario()
    {
        if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['clave'])  && isset($_POST['mail']) && isset($_POST['localidad'])) {
            $usuario =  new Usuario($_POST['nombre'], $_POST['apellido'], $_POST['clave'], $_POST['mail'], $_POST['localidad']);
            return $usuario;
        }
        echo "no se puede instanciar y guardar";
        return null;
    }
}
