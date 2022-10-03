<?php
/*
*/

class Usuario
{
    public $id;
    public $nombre;
    public $apellido;
    public $clave;
    public $mail;
    public $fecha_de_registro;
    public $localidad;

    public function __construct($nombre = "", $apellido = "", $clave = "", $mail = "", $localidad = "", $id = null, $fecha_de_registro = null)
    {
        $this->id = $id == null ? $id = $this->generarId() : $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->localidad = $localidad;
        $this->fecha_de_registro = $fecha_de_registro == null ? $fecha_de_registro = date("Y-m-d") : $fecha_de_registro;
    }

    private function generarId()
    {
        return random_int(1, 10000);
    }

    static function listarUsuario(Usuario $usuario)
    {
        $stringUsuario = "<ul> <li>ID: " . $usuario->id  . "</li>";
        $stringUsuario .= "<li>Nombre: " . $usuario->nombre . "</li>";
        $stringUsuario .= "<li>Apellido: " . $usuario->apellido . "</li>";
        $stringUsuario .= "<li>Clave: " . $usuario->clave . "</li>";
        $stringUsuario .= "<li>Mail: " . $usuario->mail  . "</li>";
        $stringUsuario .= "<li>Localidad: " . $usuario->localidad  . "</li>";
        $stringUsuario .= "<li>Fecha registro: " . $usuario->fecha_de_registro  . "</li> </ul>";
        return $stringUsuario;
    }

    public static function mostrarListaUsuarios($array)
    {
        $usuarios = self::ConvertirArrayAUsuarios($array);
        if (!empty($usuarios)) {
            $retorno = "<br>";
            foreach ($usuarios as $usuario) {
                $retorno .=  self::listarUsuario($usuario);
            }
            $retorno .= "</br>";
            return $retorno;
        }
        $retorno = "Esta Vacio";
        return $retorno;
    }

    public static function ConvertirArrayAUsuarios($array)
    {
        $retorno = array();
        foreach ($array as  $value) {
            array_push($retorno, new Usuario($value["nombre"], $value["apellido"], $value["clave"], $value["mail"], $value["localidad"], $value["id"], $value["fecha_de_registro"]));
        }
        return $retorno;
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
            $this->clave == $usuario->clave
            && $this->mail == $usuario->mail
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
            } else if ($this->mail == $usuario->mail) {
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
