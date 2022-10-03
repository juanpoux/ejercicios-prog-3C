<?php
/*
Juan Poux 3D
Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

$caracteres = array('h', 'o', 'l', 'a');

$cadena = invertirArray($caracteres);

var_dump($cadena);

function invertirArray($array)
{
    $cadenaInvertida = array();
    for($i = count($array)-1; $i >= 0; $i--)
    {
        if($array[$i] != null)
        {
            array_push($cadenaInvertida, $array[$i]);
        }
    }

    return $cadenaInvertida;
    // var_dump($cadenaInvertida);
}

?>