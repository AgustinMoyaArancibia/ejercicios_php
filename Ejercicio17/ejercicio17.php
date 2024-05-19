<?php
class Auto {


    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;


public function __construct($marca , $color , $precio = 0 , $fecha = null){

    

$this ->_marca = $marca;
$this ->_color = $color;
$this ->_precio = $precio;
$this ->_fecha = $fecha;

}


//metodo de instacia se refiere a metodo normales 
public function AgregarImpuestos($impuesto){

    if($this -> _precio !== null){

        $this -> _precio += $impuesto;
    }
}

//cuando pone metodo de clase se refiere a funciones estaticas 
//en una condicion ? signfica true y : significa false
public static function MostrarAuto($auto) {
    echo "Marca: " . $auto->_marca . "<br>";
    echo "Color: " . $auto->_color . "<br>";
    echo "Precio: " . $auto->_precio . "<br>";
    echo "Fecha: " . ($auto->_fecha !== null ? $auto->_fecha->format('Y-m-d') : "No disponible") . "<br>";
}


public function Equals ( $obj1){

   return $this->_marca === $obj1 ->_marca; 

}

public static function Add($auto1 , $auto2){

    if ($auto1->_marca === $auto2->_marca && $auto1->_color === $auto2->_color) {
        return $auto1->_precio + $auto2->_precio;
    } else {
        return 0;
    }


}







}
?>