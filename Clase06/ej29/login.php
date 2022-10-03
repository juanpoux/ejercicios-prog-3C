<?php

/**
Aplicación No 29( Login con bd)
Archivo: Login.php
método:POST
Recibe los datos del usuario(clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado en la
base de datos,
Retorna un :
“Verificado” si el usuario existe y coincide la clave también.
“Error en los datos” si esta mal la clave.
“Usuario no registrado si no coincide el mail“
Hacer los métodos necesarios en la clase usuario.
 */




class Login
{

    public function __construct()
    {
        
    }
    
    public static function login($usuario)
    {
        include_once "./usuario.php";
        include_once "./registro.php";

        $listaUsuarios = Registro::recibirListaUsuarios();
        $listaUsuarios = Usuario::ConvertirArrayAUsuarios($listaUsuarios);
        $mostrar = $usuario->verificarUsuario($listaUsuarios);
        return $mostrar;
    }
}
