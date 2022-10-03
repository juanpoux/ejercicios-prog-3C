<?php

/*

Aplicación No 22 ( Login)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail) por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
Retorna un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario

*/

include_once "./usuario.php";

$usuarioUno = new Usuario($_POST["nombre"], $_POST["clave"], $_POST["mail"]);
$usuarioDos = new Usuario("Juan", "1234562", "jj");
$arrayUsuarios = array($usuarioDos);

// var_dump($arrayUsuarios);

echo Usuario::mostrarUsuario($usuarioUno);

echo "<br><br><br><br>";

echo $usuarioUno->verificarUsuario($arrayUsuarios);

// if($usuarioUno->verificarUsuario($arrayUsuarios))
// {
//     echo "existe";
// }
// else
// echo "no existe o no anda";
















/*
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
*/
// $usuario = new Usuario($_POST["nombre"], $_POST["clave"], $_POST["mail"]);
