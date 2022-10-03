<?php

/*
Aplicación No 25 ( AltaProducto)
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST

crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un
objeto y utilizar sus métodos para poder verificar si es un producto existente, si ya existe
el producto se le suma el stock , de lo contrario se agrega al documento en un nuevo
renglón
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“ si no se pudo hacer
Hacer los métodos necesarios en la clase
*/

include_once "./manejadorJson.php";

class Producto
{
    public $codigoDeBarras;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;
    public $id;

    public function __construct($codigoDeBarras, $nombre, $tipo, $stock, $precio, $id = null)
    {
        $this->id = $id == null ? $id = random_int(1, 10000) : $this->id = $id;
        $this->codigoDeBarras = $codigoDeBarras;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->stock = $stock;
        $this->precio = $precio;
    }

    public  function agregarProducto($path)
    {
        $productos = ManejadorJson::leerJson($path);
        $retorno = "Ingresado";

        if ($productos != null) {
            foreach ($productos as $p) {
                if ($this->id == $p->id) {
                    $p->stock += $this->stock;
                    $retorno = "Actualizado";
                }
            }
            if ($retorno != "Actualizado")
                array_push($productos, $this);

            ManejadorJson::escribirJson($path, $productos);
            return $retorno;
        }
        return "No se pudo hacer";
    }

}
