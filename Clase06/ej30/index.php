<?php

include_once "./altaProducto.php";
include_once "./registro.php";
include_once "./producto.php";

$value = $_POST;
$prod = new Producto($value["codigo_de_barra"], $value["nombre"], $value["tipo"], $value["stock"], $value["precio"]);


// AltaProducto::existeProducto(77900361);

echo AltaProducto::agregarRegistroProducto($prod);