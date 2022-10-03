<?php

class Archivos
{

    // public $_path;
    // public function __construct($_path)
    // {
    //     if (!file_exists($_path)) {
    //         mkdir($_path, 0777, true);
    //     }

    //     $this->_path = $_path;
    // }

    public static function cambiarNombre($nombre)
    {
        $nombreSinPuntos = explode('.', $_FILES["imagen"]["name"]);
        $nombreSinPuntos[0] = $nombre;
        $destino = $nombreSinPuntos[0] . "." . $nombreSinPuntos[1];
        return $destino;
    }

    public static function subirArchivo($path, $nombre)
    {
        if (!file_exists($path))
            mkdir($path, 0777, true);

        $destino = $path . self::cambiarNombre($nombre);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino);
    }
}

// parte de archivos
// if (!file_exists("./Usuario/Fotos/")) {
//     mkdir("./Usuario/Fotos/", 0777, true);
// }
// $nombre = explode('.', $_FILES["imagen"]["name"]);
// $extension = $nombre[1];
// $destino = "./Usuario/Fotos/usuarioID-" . $usuario->_id . "." . $extension;
// move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino);
