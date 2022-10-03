<?php
/*
Aplicación No 20 (Registro CSV)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario
*/

class Usuario
{
    private $_nombre;
    private $_clave;
    private $_mail;

    public function __construct($_nombre, $_clave, $_mail)
    {
        $this->_nombre = $_nombre;
        $this->_clave = $_clave;
        $this->_mail = $_mail;
    }

    static function mostrarUsuario(Usuario $usuario)
    {
        $stringUsuario = "Nombre: " . $usuario->_nombre;
        $stringUsuario .= "Clave: " . $usuario->_clave;
        $stringUsuario .= "Mail: " . $usuario->_mail . "<br>";
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

}
