<?php
include 'C:\xampp\htdocs\Ejercicio17\ejercicio17.php';

class Garage{

    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial, $precioPorHora = null) {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = array();
    }

    public function MostrarGarage() {
        echo "Razón Social: " . $this->_razonSocial . "<br>";
        echo "Precio por Hora: " . $this->_precioPorHora . "<br>";
        echo "Autos en el Garage: <br>";
        foreach ($this->_autos as $auto) {
            Auto::MostrarAuto($auto);
            echo "<br>";
        }
    }

    public function Equals($auto){

        return in_array($auto , $this->_autos);

    }

    public function Add($auto){

        if(!$this->Equals($auto))
        {
            $this->autos[] = $auto;
            echo "se agrego el auto";

        }else{
            echo "no se agrego el auto";
        }
    }

    public function Remove($auto){

    $index = array_search($auto , $this->_autos);

        if($index !== null){
            unset($this->_autos[$index]);
            echo "se elimino el auto";
        }else{
            echo "no habia auto para eliminar ";
        }


    }

}


?>