<?php

/*
Aplicación No 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato
con la fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer
el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.
*/

include_once "./usuario.php";
include_once "./files.php";

// $usuarioUno = new Usuario("Thiago", "5555", "thiaguin@gggg");
// $usuarioDos = new Usuario("Juan", "1234562", "jj");
// $usuarioTres = new Usuario("Pepe", "1234562", "asd");
// $arrayUsuarios = array($usuarioDos, $usuarioUno, $usuarioTres);

// $arrayUsuarios = array();

$arrayUsuarios = Usuario::leerjson("./usuarios.json");

$usuario = new Usuario($_POST["nombre"], $_POST["clave"], $_POST["mail"]);
array_push($arrayUsuarios, $usuario);
// var_dump($arrayUsuarios);
Usuario::hacerjson("./usuarios.json", $arrayUsuarios);

######################################################################
Archivos::subirArchivo("./Usuario/Fotos/", $usuario->_id);
######################################################################


######################################################################
// parte de archivos
// if(!file_exists("./Usuario/Fotos/")){
//     mkdir("./Usuario/Fotos/", 0777, true);
// }
// $nombre = explode('.', $_FILES["imagen"]["name"]);
// $extension = $nombre[1];
// $destino = "./Usuario/Fotos/usuarioID-" . $usuario->_id . "." . $extension;
// move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino);
######################################################################













// $arrayQueVale = array();

// foreach ($acaReciboUsuarios as $value) {    
//     array_push($arrayQueVale, new Usuario($value->_nombre, $value->_clave, $value->_mail, $value->_id, $value->_fechaRegistro));
// }

// var_dump($arrayQueVale);
