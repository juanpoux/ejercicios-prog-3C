<?php

/*

*/


/*
INSERT INTO `usuario`(`nombre`, `apellido`, `clave`, `mail`, `fecha_de_registro`, `localidad`) 
VALUES ('Bili','Baus', 0123,'bhoff5@addthis.com','2020-11-27','Moreno');
*/
class Registro
{

    public static function agregarRegistroUsuario($usuario)
    {
        try {
            $db = AccesoDatos::dameUnObjetoAcceso();
            $query = $db->RetornarConsulta("INSERT INTO usuario (nombre, apellido, clave, mail, fecha_de_registro, localidad) VALUES (:nombre, :apellido, :clave, :mail, :fecha_de_registro, :localidad)");

            $query->bindParam(':nombre', $usuario->nombre);
            $query->bindParam(':apellido', $usuario->apellido);
            $query->bindParam(':clave', $usuario->clave);
            $query->bindParam(':mail', $usuario->mail);
            $query->bindParam(':fecha_de_registro', $usuario->fecha_de_registro);
            $query->bindParam(':localidad', $usuario->localidad);

            return $query->execute();
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }

   

    public static function recibirListaUsuarios()
    {
        try {
            $db = AccesoDatos::dameUnObjetoAcceso();
            $query = $db->RetornarConsulta("SELECT * FROM usuario");
            $query->execute();
            $result = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Throwable $th) {
            echo "ERROR RECIBIENDO LISTA DE USUARIOS";
        }
    }

    public static function recibirListaProductos()
    {
        try {
            $db = AccesoDatos::dameUnObjetoAcceso();
            $query = $db->RetornarConsulta("SELECT * FROM producto");
            $query->execute();
            $result = $query->fetchAll(\PDO::FETCH_ASSOC);
            // $result = $query->fetchAll(PDO::FETCH_CLASS, "Producto", get_class_vars("Producto")); no funciona
            return $result;
        } catch (\Throwable $th) {
            echo "ERROR RECIBIENDO LISTA DE PRODUCTOS";
        }
    }

    public static function recibirListaVentas()
    {
        try {
            $db = AccesoDatos::dameUnObjetoAcceso();
            $query = $db->RetornarConsulta("SELECT * FROM venta");
            $query->execute();
            $result = $query->fetchAll(\PDO::FETCH_ASSOC);
            // $result = $query->fetchAll(PDO::FETCH_CLASS, "RealizarVenta", get_class_vars("RealizarVenta"));
            return $result;
        } catch (\Throwable $th) {
            echo "ERROR RECIBIENDO LISTA DE PRODUCTOS";
        }
    }

}
