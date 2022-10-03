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

include_once "./usuario.php";
include_once "./listado.php";

switch (retornarListado()) {
    case 'usuarios':
        $arrayUsuarios = Usuario::leerUuarios("./usuarios.csv");
        foreach ($arrayUsuarios as $usuarito) {
            echo Usuario::mostrarUsuario($usuarito);
        }
        break;

    default:
        echo "Por ahora solo funciona con el valor 'usuarios'";
        break;
}

// $usuario = new Usuario($_POST["nombre"], $_POST["clave"], $_POST["mail"]);
