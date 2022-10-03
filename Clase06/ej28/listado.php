<?php

/*
Aplicación No 28 ( Listado BD)
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,ventas)
cada objeto o clase tendrán los métodos para responder a la petición
devolviendo un listado <ul> o tabla de html <table>
*/

switch ($_GET["listado"]) {
    case 'usuarios':
        include_once "./usuario.php";
        include_once "./registro.php";

        // $usuario = new Usuario("Juan", "Poux", 1234, "jasd", null, null);
        // echo Usuario::listarUsuario($usuario);

        echo "Listado de usuarios: <br>";
        $usuarios = Registro::recibirListaUsuarios();
        echo Usuario::mostrarListaUsuarios($usuarios);

        // echo "<br><br><br><br>";
        // var_dump($usuarios);

        break;
    case 'productos':
        include_once "./producto.php";
        include_once "./registro.php";

        echo "Listado de productos: <br>";
        $productos = Registro::recibirListaProductos();
        echo Producto::mostrarListaProductos($productos);
        break;
    case 'ventas':
        include_once "./realizarVenta.php";
        include_once "./registro.php";

        echo "Listado de ventas: <br>";
        $ventas =  Registro::recibirListaVentas();
        echo RealizarVenta::mostrarListaVentas($ventas);
        break;
    // case 'generico':
    //     include_once "./realizarVenta.php";
    //     include_once "./registro.php";

    //     echo "Listado de ventas: <br>";
    //     $ventas =  Registro::recibirLista("venta");
    //     var_dump($ventas);
    //     break;
    default:
        echo "Todavia falta...........";
        break;
}
