<?php

class Auto{

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
//que lea desde el archivo csv 
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
    

    public static function AltaAuto($auto) {
        $data = "{$auto->_marca},{$auto->_color},{$auto->_precio},{$auto->_fecha->format('Y-m-d')}\n";
        file_put_contents('autos.csv', $data, FILE_APPEND);
    }

    public static function LeerAutos() {
        $autos = array();
        $file = fopen('autos.csv', 'r');
        while (($line = fgets($file)) !== false) {
            $data = explode(',', $line);
            $marca = $data[0];
            $color = $data[1];
            $precio = $data[2];
            $fecha = DateTime::createFromFormat('Y-m-d', trim($data[3]));
            $auto = new Auto($marca, $color, $precio, $fecha);
            $autos[] = $auto;
        }
        fclose($file);
        return $autos;
    }


    
    public static function AltaAuto2($auto) {
        $data = "{$auto->_marca},{$auto->_color},{$auto->_precio},{$auto->_fecha->format('Y-m-d')}\n";
        $archivo = fopen("autos1.csv", "a"); // Abrir el archivo en modo de escritura al final
        if ($archivo) {
            if (fwrite($archivo, $data) !== false) { // Escribir los datos en el archivo
                echo "Auto agregado correctamente al archivo.\n";
            } else {
                echo "Error al escribir en el archivo.\n";
            }
            fclose($archivo); // Cerrar el archivo después de escribir
        } else {
            echo "No se pudo abrir el archivo.\n";
        }
    }

}


?>