<?php

/*

Aplicación No 27 (Registro BD)
Archivo: registro.php
método:POST
Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
guardando los datos la base de datos
retorna si se pudo agregar o no.
*/
include_once "./usuario.php";
include_once "./accesoDatos.php";


/*
INSERT INTO `usuario`(`nombre`, `apellido`, `clave`, `mail`, `fecha_de_registro`, `localidad`) 
VALUES ('Bili','Baus', 0123,'bhoff5@addthis.com','2020-11-27','Moreno');
*/
class Registro
{

    public static function agregarRegistroUsuario($usuario)
    {
        try {
            //intanciar
            $db = AccesoDatos::dameUnObjetoAcceso();
            $query = $db->RetornarConsulta("INSERT INTO usuario (nombre, apellido, clave, mail, fecha_de_registro, localidad) VALUES (:nombre, :apellido, :clave, :mail, :fecha_de_registro, :localidad)");

            $query->bindParam(':nombre', $usuario->_nombre);
            $query->bindParam(':apellido', $usuario->_apellido);
            $query->bindParam(':clave', $usuario->_clave);
            $query->bindParam(':mail', $usuario->_mail);
            $query->bindParam(':fecha_de_registro', $usuario->_fechaRegistro);
            $query->bindParam(':localidad', $usuario->_localidad);

            return $query->execute();
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
        }
    }
}
