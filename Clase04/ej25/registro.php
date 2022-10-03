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

$pathProductos = "./productos.json";

// $prod1 = new Producto("123456", "Samsung 24'HD", "Monitor", 4, 34000, 123);
// $prod2 = new Producto("123456", "Samsung 24'HD", "Monitor", 4, 34000, 123);
// $prod3 = new Producto("456789", "LG 27'HD", "Monitor", 4, 54000);

// $arrayProds = array($prod1, $prod3);


// echo $prod2->agregarProducto("./productos.json");


switch ($_GET["accion"]) {
    case 'register':
        include_once "./producto.php";
        include_once "./files.php";
        include_once "./manejadorJson.php";

        $arrayProds = ManejadorJson::leerJson($pathProductos);

        $prod = new Producto($_POST["codigoDeBarras"], $_POST["nombre"], $_POST["tipo"], $_POST["stock"], $_POST["precio"]);

        array_push($arrayProds, $prod);

        ManejadorJson::escribirJson($pathProductos, $arrayProds);

        break;

    default:
        echo "Todavia falta...........";
        break;
}
