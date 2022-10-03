<?php
/*
Ejercicio 1 - Juan Poux
Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/

$acumulador = 1;
$contador = 0;

while ($acumulador+$contador < 1000) {
    $acumulador+=$contador;
    echo $acumulador."<br>";
    $contador++;
}

echo "se sumaron ".$contador." numeros";
?>