<?php
/*
Aplicación No 22 ( Login)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
Retorna un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario
*/

class Usuario
{
    public $_nombre;
    public $_clave;
    public $_mail;

    public function __construct($_nombre = "", $_clave, $_mail)
    {
        $this->_nombre = $_nombre;
        $this->_clave = $_clave;
        $this->_mail = $_mail;
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
        $stringUsuario = "<ul> <li>Nombre: " . $usuario->_nombre . "</li>";
        $stringUsuario .= "<li>Clave: " . $usuario->_clave . "</li>";
        $stringUsuario .= "<li>Mail: " . $usuario->_mail  . "</li> </ul>";
        return $stringUsuario;
    }

    static function convertirUsuarioAString(Usuario $usuario)
    {
        $stringUsuario = $usuario->_nombre . ",";
        $stringUsuario .= $usuario->_clave . ",";
        $stringUsuario .= $usuario->_mail . PHP_EOL;
        return $stringUsuario;
    }


    static function altaUsuario($usuario, $path, bool $agregar = true)
    {
        $archivo = fopen($path, "a");

        fwrite($archivo, Usuario::convertirUsuarioAString($usuario));

        fclose($archivo);
    }

    static function leerUuarios($path)
    {
        $archivo = fopen($path, "r");
        $usuarios = array();

        // Lee línea a línea hasta EOF
        while (!feof($archivo)) {

            $linea = fgets($archivo);
            if (!empty($linea)) {
                $data = explode(",", $linea);
                array_push($usuarios, new Usuario($data[0], $data[1], $data[2]));
            }
        }
        fclose($archivo);
        return $usuarios;
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
}
