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


switch ($_GET["accion"]) {
    case 'registrarUsuario':
        include_once "./usuario.php";
        include_once "./registro.php";

        $usuario = Usuario::recibirUsuario();

        var_dump($usuario);

        if (Registro::agregarRegistroUsuario($usuario))
            echo "se pudo";
        else
            echo "no se pudo";

        break;
    default:
        echo "Todavia falta...........";
        break;
}
