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

        var_dump($usuario);

        if (Registro::agregarRegistroUsuario($usuario))
            echo "se pudo";
        else
            echo "no se pudo";

        break;
    case 'listar':
        include_once "./usuario.php";
        include_once "./registro.php";

        
    default:
        echo "Todavia falta...........";
        break;
}
