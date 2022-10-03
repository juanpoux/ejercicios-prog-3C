<?php
include_once "./index.php";

// ● Crear dos objetos “Auto” de la misma marca y distinto color.
$autoUno = new Auto("Peugeot", "Negro", 100);
Auto::mostrarAuto($autoUno);

$autoDos = new Auto("Peugeot", "Rojo", 200);
Auto::mostrarAuto($autoDos);

// ● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
$autoTres = new Auto("Fiat", "Azul", 5000);
Auto::mostrarAuto($autoTres);

$autoCuatro = new Auto("Fiat", "Azul", 6000);
Auto::mostrarAuto($autoCuatro);

// ● Crear un objeto “Auto” utilizando la sobrecarga restante.
$autoCinco = new Auto("Chevrolet", "Blanco", 7000, "22 - 05 - 2020");
Auto::mostrarAuto($autoCinco);

// ● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.
$autoTres->agregarImpuestos(1500);
$autoCuatro->agregarImpuestos(1500);
$autoCinco->agregarImpuestos(1500);
Auto::mostrarAuto($autoTres);
Auto::mostrarAuto($autoCuatro);
Auto::mostrarAuto($autoCinco);

// ● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.
$importe = Auto::add($autoUno, $autoDos);
echo "El importe de hacer \"add\" entre el primer y segundo auto es: " . $importe . "<br>";

echo "<br>";

// ● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
if ($autoUno->equals($autoDos))
    echo "Son iguales";
else
    echo "Son distintos";

echo "<br>";

if ($autoUno->equals($autoCinco))
    echo "Son iguales";
else
    echo "Son distintos";
echo "<br>";
echo "<br>";

// ● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)

// $autos = array($autoUno, $autoDos, $autoTres, $autoCuatro, $autoCinco);
$autitos = array(1 => $autoUno, 2 => $autoDos, 3 => $autoTres, 4 => $autoCuatro, 5 => $autoCinco);

echo "<br>";
echo "<br>";

for ($i = 1; $i < count($autitos) +1; $i++) {
    if ($i % 2 != 0) {
        echo "posicion $i del array";
        echo "<br>";
        Auto::mostrarAuto($autitos[$i]);
    }
}
?>