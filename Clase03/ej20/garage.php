<?php
/*
Juan Poux

Aplicación No 18 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:

_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
métodos.
*/

include_once "./auto.php";

class Garage
{

    // _razonSocial (String)
    // _precioPorHora (Double)
    // _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
    //atributos
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;


    // i. La razón social.
    // ii. La razón social, y el precio por hora.
    //constructor
    public function __construct($_razonSocial, $_precioPorHora = 0)
    {
        $this->_razonSocial = $_razonSocial;
        $this->_precioPorHora = $_precioPorHora;
        $this->_autos = array();
    }

    // Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y que mostrará todos los atributos del objeto.   
    public function mostrarGarage()
    {
        $cadenaGarage = "Razon Social: $this->_razonSocial" . "<br>";
        $cadenaGarage .= "Precio por Hora: $$this->_precioPorHora" . "<br><br>";
        $cadenaGarage .= "Autos en el garage: <br>";
        $contador = 1;
        foreach ($this->_autos as $auto) {
            $cadenaGarage .= "$contador ° auto:<br>";
            $cadenaGarage .= Auto::mostrarAuto($auto);
            $contador++;
        }
        return $cadenaGarage;
    }

    // Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
    public function equals(Auto $auto)
    {
        if ($auto != null) {
            foreach ($this->_autos as $autoGarage) {
                if ($autoGarage->equals($auto)) {
                    return true;
                }
            }
        }
        return false;
    }

    // Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage” (sólo si el auto no está en el garaje, de lo contrario informarlo).
    // Ejemplo: $miGarage->Add($autoUno);
    public function add(Auto $auto)
    {
        if ($auto != null) {
            if (!$this->equals($auto)) {
                array_push($this->_autos, $auto);
            } else {
                echo "<br><br>El auto ya se encuentra en el garage. <br><br>";
            }
        }
    }

    // Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
    // Ejemplo: $miGarage->Remove($autoUno);
    public function remove(Auto $auto)
    {
        if ($auto != null) {
            if ($this->equals($auto)) {
                for ($i=0; $i < count($this->_autos); $i++) {
                    if($auto->equals($this->_autos[$i]))
                    {
                        unset($this->_autos[$i]);
                    }
                }
            } else {
                echo "<br><br>No es posible remover un auto que no se encuentra en el garage<br><br>";
            }
        }
    }


    /*
    Crear un método de clase para poder hacer el alta de un Garage y, guardando los datos en un archivo garages.csv.
    Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo garage.csv
    Se deben cargar los datos en un array de garage.
    En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
    los métodos.
    */

    public static function convertirGarageAString(Garage $garage)
    {
        $cadenaGarage = $garage->_razonSocial . ",";
        $cadenaGarage .= $garage->_precioPorHora . PHP_EOL;
        foreach ($garage->_autos as $auto) {
            $cadenaGarage .= Auto::convertirAutoAString($auto);
        }
        return $cadenaGarage . PHP_EOL;
    }

    static function altaGarage($garage, $path, bool $agregar = true)
    {
        $archivo = fopen($path, "a");

        fwrite($archivo, Garage::convertirGarageAString($garage));

        fclose($archivo);
    }

    static function leerGarage($path)
    {
        $archivo = fopen($path, "r");
        $autos = array();
        $arrayGarage = array();
        $garagito = new Garage("", 0);

        while (!feof($archivo)) {
            $linea = fgets($archivo);
            if (!empty($linea)) {
                
                $data = explode(",", $linea);

                if(count($data) == 2) {
                    $garagito = null;
                    $garagito = new Garage($data[0], $data[1]);
                }
                else {
                    if(count($data) == 4) {
                        array_push($garagito->_autos, new Auto($data[0], $data[1], $data[3], $data[2]));
                    }
                    else {
                        array_push($arrayGarage, $garagito);
                    }
                }
            }
        }
        return $arrayGarage;
    }

}
