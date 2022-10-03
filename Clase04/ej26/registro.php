<?php

/*
Aplicación No 25 ( AltaProducto)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un
objeto y utilizar sus métodos para poder verificar si es un producto existente, si ya existe
el producto se le suma el stock , de lo contrario se agrega al documento en un nuevo
renglón
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase
*/

// include_once "./producto.php";
// include_once "./files.php";
// include_once "./manejadorJson.php";
// include_once "./usuario.php";
// include_once "./realizarVenta.php";


switch ($_GET["accion"]) {
    case 'registrarUsuario':
        // include_once "./producto.php";
        include_once "./files.php";
        include_once "./manejadorJson.php";
        include_once "./usuario.php";

        $pathUsuarios = "./usuarios.json";
        $pathFotosUsuarios = "./Usuario/Fotos/";

        $arrayUsuarios = Usuario::leerjson($pathUsuarios);

        $usuario = new Usuario($_POST["nombre"], $_POST["clave"], $_POST["mail"]);
        array_push($arrayUsuarios, $usuario);
        Usuario::hacerjson($pathUsuarios, $arrayUsuarios);

        ######################################################################
        # parte de archivos
        Archivos::subirArchivo($pathFotosUsuarios, $usuario->_id);
        ######################################################################

        break;
    case 'registrarProducto':
        include_once "./producto.php";
        // include_once "./files.php";
        include_once "./manejadorJson.php";
        // include_once "./usuario.php";

        $pathProductos = "./productos.json";

        $arrayProds = ManejadorJson::leerJson($pathProductos);

        $prod = new Producto($_POST["codigoDeBarras"], $_POST["nombre"], $_POST["tipo"], $_POST["stock"], $_POST["precio"]);

        array_push($arrayProds, $prod);

        ManejadorJson::escribirJson($pathProductos, $arrayProds);

        break;
    case 'vender':
        include_once "./producto.php";
        include_once "./files.php";
        include_once "./manejadorJson.php";
        include_once "./usuario.php";
        include_once "./realizarVenta.php";

        $pathVentas = "./ventas.json";
        $arrayVentas = ManejadorJson::leerJson($pathVentas);

        $venta = new RealizarVenta($_POST["codProducto"], $_POST["usuarioId"], $_POST["cantidad"]);

        $retornoVenta = $venta->vender();
        echo $retornoVenta;
        if ($retornoVenta == "Venta realizada") {
            array_push($arrayVentas, $venta);
        }

        ManejadorJson::escribirJson($pathVentas, $arrayVentas);

        break;

    default:
        echo "Todavia falta...........";
        break;
}
