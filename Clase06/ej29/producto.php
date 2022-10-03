<?php

/*
*/

use Producto as GlobalProducto;

// include_once "./manejadorJson.php";

class Producto
{
    public $codigo_de_barra;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;
    public $id;
    public $fecha_de_creacion;
    public $fecha_de_modificacion;

    public function __construct($codigo_de_barra, $nombre, $tipo, $stock, $precio, $fecha_de_creacion = null, $fecha_de_modificacion = null, $id = null)
    {
        $this->id = $id == null ? $id = random_int(1, 10000) : $id;
        $this->fecha_de_creacion = $fecha_de_creacion == null ? $fecha_de_creacion = date("Y-m-d") : $fecha_de_creacion;
        $this->fecha_de_modificacion = $fecha_de_modificacion == null ? $fecha_de_modificacion = date("Y-m-d") : $fecha_de_modificacion;
        $this->codigo_de_barra = $codigo_de_barra;
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
                if ($this->codigo_de_barra == $p->codigo_de_barra) {
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


    //INICIO FUNCS DE LISTADOS
    static function listarProducto(self $producto)
    {
        $stringProducto = "<ul> <li>ID: " . $producto->id  . "</li>";
        $stringProducto .= "<li>Nombre: " . $producto->nombre . "</li>";
        $stringProducto .= "<li>Codigo de barras: " . $producto->codigo_de_barra . "</li>";
        $stringProducto .= "<li>Tipo: " . $producto->tipo . "</li>";
        $stringProducto .= "<li>Precio: " . $producto->precio  . "</li>";
        $stringProducto .= "<li>Stock: " . $producto->stock  . "</li>";
        $stringProducto .= "<li>Fecha creacion: " . $producto->fecha_de_creacion . "</li>";
        $stringProducto .= "<li>Fecha modificacion: " . $producto->fecha_de_modificacion . "</li> </ul>";
        return $stringProducto;
    }

    public static function mostrarListaProductos($array)
    {
        $productos = self::ConvertirArrayAProductos($array);
        if (!empty($productos)) {
            $retorno = "<br>";
            foreach ($productos as $producto) {
                $retorno .=  self::listarProducto($producto);
            }
            $retorno .= "</br>";
            return $retorno;
        }
        $retorno = "Esta Vacio";
        return $retorno;
    }

    public static function ConvertirArrayAProductos($array)
    {
        $retorno = array();
        foreach ($array as  $value) {
            array_push($retorno, new Producto($value["codigo_de_barra"], $value["nombre"], $value["tipo"], $value["stock"], $value["precio"], $value["fecha_de_creacion"], $value["fecha_de_modificacion"],$value["id"]));
        }
        return $retorno;
    }
    //FIN FUNCS DE LISTADOS
}
