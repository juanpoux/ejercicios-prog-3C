<?php
/*
Ejercicio 2 - Juan Poux
Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/
date_default_timezone_set("America/Argentina/Buenos_Aires");
// $fecha = strtotime("today");
// // $d = strtotime("21-01-2022 00:00:00");
// // echo date("Y-m-d h:i:sa", $d)

//  if($fecha > strtotime("21-12-2021 00:00:00") && 
//  $fecha < strtotime("21-03-2022 00:00:00")) {
//     echo "Es verano";
//  }
//  else{
//     if($fecha > strtotime("21-03-2022 00:00:00") && $fecha < strtotime("21-03-2022 00:00:00"))
//     {
//         echo "es otoño";
//     }
//  }

$dia = date("d");
$mes = date("m");
$estacion = "primavera";
switch ($mes) {
    case 12:
        if($dia < 21)
        {
            break;
        }
    case 1:
    case 2:
        $estacion = "Verano";
        break;
    case 3:
        if($dia < 21)
        {
            $estacion = "Verano";
            break;
        }
    case 4:
    case 5:
        $estacion = "Otoño";
        break;
    case 6:
        if($dia < 21)
        {
            $estacion = "otoño";
            break;
        }
    case 7:
    case 8:
        $estacion = "invierno";
        break;
    default:
        break;
}


echo $estacion;