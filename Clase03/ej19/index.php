<?php
/*
Juan Poux
Aplicación No 19 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos

privados: _color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como

parámetros: i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
por parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);


Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un
archivo autos.csv.
Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo
autos.csv
Se deben cargar los datos en un array de autos.
En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.
● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)

PHP_EOL (string)
    El símbolo 'Fin De Línea' correcto de la plataforma en uso.
*/

include_once "./auto.php";

/*
Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un
archivo autos.csv.
Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo
autos.csv
*/

$autoUno = new Auto("Peugeot", "Negro", 100);
$autoDos = new Auto("Peugeot", "Rojo", 200);
$autoTres = new Auto("Fiat", "Azul", 5000);
$autoCuatro = new Auto("Fiat", "Azul", 6000);
$autoCinco = new Auto("Chevrolet", "Blanco", 7000, "22 - 05 - 2020");
$autitos = array(1 => $autoUno, 2 => $autoDos, 3 => $autoTres, 4 => $autoCuatro, 5 => $autoCinco);

foreach ($autitos as $autos) {
    Auto::altaAuto($autos, "./autos.csv");
}
// Auto::altaAuto($autoUno, "./autos.csv");

$mostrar = array();
$mostrar = Auto::leerAutos("./autos.csv");
var_dump($mostrar);

?>