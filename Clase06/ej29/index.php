<?php

/*
Aplicación No 28 ( Listado BD)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,ventas)
cada objeto o clase tendrán los métodos para responder a la petición
devolviendo un listado <ul> o tabla de html <table>
*/


switch ($_GET["accion"]) {
    case 'registrarUsuario':
        include_once "./usuario.php";
        include_once "./registro.php";

        $usuario = Usuario::recibirUsuario();

        if (Registro::agregarRegistroUsuario($usuario))
            echo "se pudo";
        else
            echo "no se pudo";

        break;
    case 'listar':
        include_once "./usuario.php";
        include_once "./registro.php";
        break;
    case 'login':
        include_once "./login.php";
        include_once "./usuario.php";
        $usuario =  new Usuario("", "", $_POST['clave'], $_POST['mail']);
        echo Login::login($usuario);

        break;
    default:
        echo "Todavia falta...........";
        break;
}
