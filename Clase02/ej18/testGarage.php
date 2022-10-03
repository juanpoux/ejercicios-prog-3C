<?php
include_once "./garage.php";

$garage = new Garage("Juan Poux", 50);

$autoUno = new Auto("Peugeot", "Negro", 100);
$autoDos = new Auto("Peugeot", "Rojo", 200);
$autoTres = new Auto("Fiat", "Azul", 5000);
$autoCuatro = new Auto("Fiat", "Azul", 6000);
$autoCinco = new Auto("Chevrolet", "Blanco", 7000, "22 - 05 - 2020");

$garage->add($autoUno);
$garage->add($autoDos);
$garage->add($autoTres);
$garage->add($autoCuatro);
$garage->add($autoCinco);

echo $garage->mostrarGarage();

echo "<br><br><br><br>";

//remueve 
$garage->remove($autoTres);
//remueve uno que ya no está
$garage->remove($autoTres);

echo $garage->mostrarGarage();


?>