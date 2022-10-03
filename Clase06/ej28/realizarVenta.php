<?php

/*
*/

use RealizarVenta as GlobalRealizarVenta;

class RealizarVenta
{

    public $id_producto;
    public $id_usuario;
    public $cantidad;
    public $id;
    public $fecha_de_venta;

    public function __construct($id_producto, $id_usuario, $cantidad, $fecha_de_venta = null, $id = null)
    {
        $this->id_producto = $id_producto;
        $this->id_usuario = $id_usuario;
        $this->cantidad = $cantidad;
        $this->fecha_de_venta = $fecha_de_venta == null ? $fecha_de_venta = date("Y-m-d") : $fecha_de_venta;
        $this->id = $id == null ? $id = random_int(1, 10000) : $this->id = $id;
    }

    public static function verificarUsuario($id)
    {
        include_once "./producto.php";
        include_once "./files.php";
        include_once "./manejadorJson.php";
        include_once "./usuario.php";

        $pathUsuarios = "./usuarios.json";

        try {
            $usuarios = ManejadorJson::leerJson($pathUsuarios);

            foreach ($usuarios as $u) {
                if ($u->_id == $id) {
                    return true;
                }
            }
            return false;
        } catch (\Throwable $th) {
            echo "se rompió to en usuarios" . $th;
        }
    }

    public static function verificarProducto($codigo, $cantidad)
    {
        include_once "./producto.php";
        include_once "./files.php";
        include_once "./manejadorJson.php";
        include_once "./usuario.php";

        $pathProductos = "./productos.json";
        $retorno = false;

        try {
            $productos = ManejadorJson::leerJson($pathProductos);

            // var_dump($productos);
            foreach ($productos as $p) {
                if ($p->codigoDeBarras == $codigo && $p->stock >= $cantidad) {
                    $p->stock -= $cantidad;
                    $retorno = true;
                }
            }
            ManejadorJson::escribirJson($pathProductos, $productos);
        } catch (\Throwable $th) {
            echo "se rompió to en productos" . $th;
        }

        return $retorno;
    }

    // “venta realizada”Se hizo una venta
    // “no se pudo hacer“si no se pudo hacer
    public function vender()
    {
        if (self::verificarProducto($this->id_producto, $this->cantidad)) {
            if (self::verificarUsuario($this->id_usuario)) {
                return "Venta realizada";
            } else {
                return "Usuario inexistente";
            }
        } else {
            return "No contamos con disponibilidad en ese producto";
        }
    }

    //INICIO FUNCS DE LISTADOS
    static function listarVenta(self $venta)
    {
        $stringVenta = "<ul> <li>ID Venta: " . $venta->id  . "</li>";
        $stringVenta .= "<li>ID Producto: " . $venta->id_producto . "</li>";
        $stringVenta .= "<li>ID Usuario: " . $venta->id_usuario . "</li>";
        $stringVenta .= "<li>Cantidad: " . $venta->cantidad . "</li>";
        $stringVenta .= "<li>Fecha de venta: " . $venta->fecha_de_venta . "</li> </ul>";
        return $stringVenta;
    }

    public static function mostrarListaVentas($array)
    {
        $ventas = self::ConvertirArrayAVentas($array);
        if (!empty($ventas)) {
            $retorno = "<br>";
            foreach ($ventas as $venta) {
                $retorno .=  self::listarVenta($venta);
            }
            $retorno .= "</br>";
            return $retorno;
        }
        $retorno = "Esta Vacio";
        return $retorno;
    }

    public static function ConvertirArrayAVentas($array)
    {
        $retorno = array();
        foreach ($array as  $value) {
            array_push($retorno, new RealizarVenta($value["id_producto"], $value["id_usuario"], $value["cantidad"], $value["fecha_de_venta"], $value["id"]));
        }
        return $retorno;
    }
    //FIN FUNCS DE LISTADOS
}
