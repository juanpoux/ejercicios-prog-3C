<?php

/*
Aplicación No 26 (RealizarVenta)
Archivo: RealizarVenta.php
método:POST
Recibe los datos del producto(código de barra), del usuario (el id )y la cantidad de ítems
,por POST .
Verificar que el usuario y el producto exista y tenga stock.
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000).
carga los datos necesarios para guardar la venta en un nuevo renglón.
Retorna un :
“venta realizada”Se hizo una venta
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesaris en las clases
*/

class RealizarVenta
{

    public $codProducto;
    public $usuarioId;
    public $cantidad;
    public $id;

    public function __construct($codProducto, $usuarioId, $cantidad, $id = null)
    {
        $this->codProducto = $codProducto;
        $this->usuarioId = $usuarioId;
        $this->cantidad = $cantidad;
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
        if (self::verificarProducto($this->codProducto, $this->cantidad)) {
            if (self::verificarUsuario($this->usuarioId)) {
                return "Venta realizada";
            } else {
                return "Usuario inexistente";
            }
        } else {
            return "No contamos con disponibilidad en ese producto";
        }
    }
}
