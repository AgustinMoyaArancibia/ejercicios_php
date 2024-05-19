<?php
include 'C:\xampp\htdocs\Ejercicio17\ejercicio17.php';

class Garage
{

    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial, $precioPorHora = null) {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = array();
    }

    public function MostrarGarage()
    {
        echo "Razón Social: " . $this->_razonSocial . "<br>";
        echo "Precio por Hora: " . $this->_precioPorHora . "<br>";
        echo "Autos en el Garage: <br>";

        foreach ($this->_autos as $key) {
           Auto::MostrarAuto($key);
        }    
    }


    public function Equals($auto)
    {
       return in_array($auto , $this->_autos);     
    }

    public function Add($auto)
    {

        if(!$this->Equals($auto))
        {

            $this->_autos[] = $auto;
            echo "auto dado de alta";
        }
        else{
            echo "auto NO dado de alta";
        }

    } 

    public function Remove( $auto)
    {
        $index = array_search($auto , $this->_autos);

        if($index !== null)
        {
            unset($this->_autos[$index]);
            echo "se elimino el auto";
        }
        else{

            echo "no hay nada para eliminar el auto";

        }


    }


    public static function AltaGarage($garage) {
        $data = "{$garage->_razonSocial},{$garage->_precioPorHora}\n";
        file_put_contents('garages.csv', $data, FILE_APPEND);
    }

    public static function LeerGarages() {
        $garages = array();
        $file = fopen('garages.csv', 'r');
        while (($line = fgets($file)) !== false) {
            $data = explode(',', $line);
            $razonSocial = $data[0];
            $precioPorHora = $data[1];
            $garage = new Garage($razonSocial, $precioPorHora);
            $garages[] = $garage;
        }
        fclose($file);
        return $garages;
    }
}







?>