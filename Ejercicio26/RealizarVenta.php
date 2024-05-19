<?php

    include_once 'C:\xampp\htdocs\Ejercicio26\Ventas.php';

      
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $codigo_barra = $_POST['codigo_barra'];
        $stock = $_POST['stock'];
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];



        Ventas::realizarVenta($codigo_barra,$stock,$nombre,$clave);



    }
    else{

        echo 'ERROR';
    }




?>