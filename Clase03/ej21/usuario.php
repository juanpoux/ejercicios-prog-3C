<?php
/*
Aplicación No 21 ( Listado CSV y array de usuarios)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.csv.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
<ul>
<li>Coffee</li>
<li>Tea</li>
<li>Milk</li>
</ul>
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

}
