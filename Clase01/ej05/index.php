<?php

/*
Aplicación No 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/

$nume = 43;

$nume = strval($nume);

for ($i = 20; $i < 60; $i++) {
    $nume = strval($i);
    Convertir($nume);
}

function Convertir($num)
{
    switch ($num[0]) {
        case '2':
            if ($num[1] == '0') {
                $letras = "Veinte";
            } else {
                $letras = "Veinti";
            }
            break;
        case '3':
            if ($num[1] == '0') {
                $letras = "Treinta";
            } else {
                $letras = "Treinta y ";
            }
            break;
        case '4':
            if ($num[1] == '0') {
                $letras = "Cuarenta";
            } else {
                $letras = "Cuarenta y ";
            }
            break;
        case '5':
            if ($num[1] == '0') {
                $letras = "Cincuenta";
            } else {
                $letras = "Cincuenta y ";
            }
            break;
        case '6':
            if ($num[1] == '0') {
                $letras = "Sesenta";
            } else {
                $letras = "Sesenta y ";
            }
            break;
    }

    switch ($num[1]) {
        case '1':
            $letras = $letras . "uno";
            break;
        case '2':
            $letras = $letras . "dos";
            break;
        case '3':
            $letras = $letras . "tres";
            break;
        case '4':
            $letras = $letras . "cuatro";
            break;
        case '5':
            $letras = $letras . "cinco";
            break;
        case '6':
            $letras = $letras . "seis";
            break;
        case '7':
            $letras = $letras . "siete";
            break;
        case '8':
            $letras = $letras . "ocho";
            break;
        case '9':
            $letras = $letras . "nueve";
            break;
    }
    echo $letras . "<br>";
}
