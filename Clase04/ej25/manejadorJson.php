<?php

class ManejadorJson
{

    public static function leerJson($path)
    {
        $archivo = fopen($path, "r");
        $datos = array();
        if (filesize($path) > 0) {
            $texto = fread($archivo, filesize($path));
            $datos = json_decode($texto, false);
        } else {
            echo "El archivo está vacío";
        }
        fclose($archivo);
        return $datos;
    }

    public static function escribirJson($path, $datos)
    {
        $archivo = fopen($path, "w");

        fwrite($archivo, json_encode($datos));

        fclose($archivo);
    }
}
