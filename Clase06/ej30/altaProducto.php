<?php

/*
Aplicación No 30 ( AltaProducto BD)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
, carga la fecha de creación y crear un objeto ,se debe utilizar sus métodos para poder
verificar si es un producto existente,
si ya existe el producto se le suma el stock , de lo contrario se agrega .
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase
*/

class AltaProducto
{

    function __construct()
    {
    }
    
    public static function agregarRegistroProducto(Producto $producto)
    {
        try {
            var_dump($producto);
            $prodTemporal = self::existeProducto($producto->codigo_de_barra);
            if (empty($prodTemporal)) {
                self::insertProducto($producto);
                return "Ingresado";
            } else {
                self::updateProducto($producto);
                return "Actualizado";
            }
        } catch (\Throwable $th) {
        }

        return "No se pudo hacer";
    }

    public static function existeProducto($codigo_de_barra)
    {
        include_once "./accesoDatos.php";
        try {
            $db = AccesoDatos::dameUnObjetoAcceso();
            $query = $db->RetornarConsulta("SELECT * FROM producto WHERE codigo_de_barra = :codigo_de_barra");
            $query->bindParam(':codigo_de_barra', $codigo_de_barra);

            $query->execute();
            // $result = $query->fetchAll(\PDO::FETCH_ASSOC);
            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result;
        } catch (\Throwable $th) {
            echo "ERROR RECIBIENDO UN PRODUCTO" . $th->getMessage();
        }
    }


    public static function insertProducto($producto)
    {
        include_once "./accesoDatos.php";
        // include_once "./producto.php";

        try {
            $db = AccesoDatos::dameUnObjetoAcceso();
            $query = $db->RetornarConsulta("INSERT INTO producto (codigo_de_barra, nombre, tipo, stock, precio, fecha_de_creacion, fecha_de_modificacion) VALUES (:codigo_de_barra, :nombre, :tipo, :stock, :precio, :fecha_de_creacion, :fecha_de_modificacion)");

            $query->bindParam(':codigo_de_barra', $producto->codigo_de_barra);
            $query->bindParam(':nombre', $producto->nombre);
            $query->bindParam(':tipo', $producto->tipo);
            $query->bindParam(':stock', $producto->stock);
            $query->bindParam(':precio', $producto->precio);
            $query->bindParam(':fecha_de_creacion', $producto->fecha_de_creacion);
            $query->bindParam(':fecha_de_modificacion', $producto->fecha_de_modificacion);

            return $query->execute();
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

    public static function updateProducto($producto)
    {
    }
}
