<?php
/*
Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
*/

$numeros = array();
$acumulador = 0;
$promedio;

for ($i=0; $i < 5; $i++) { 
    $numeros[$i] = rand(1,10);
}

foreach ($numeros as $key) {
    $acumulador += $key;
}

$promedio = $acumulador / count($numeros);

echo $promedio . "<br><br>";

if($promedio > 6)
{
    echo "El promedio es MAYOR a 6";
}
else
{
    if($promedio < 6)
    {
        echo "El promedio es MENOR a 6";
    }
    else
    {
        echo "El promedio es IGUAL a 6";
    }
}




?>