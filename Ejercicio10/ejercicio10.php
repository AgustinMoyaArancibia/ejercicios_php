<?php

/* Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays. */



//defino los arrays 
$array1 = array("a" => 1, "b" => 2, "c" => 3);
$array2 = array(4, 5, 6);
$array3 = array("x", "y", "z");


//creo el array asociativo de arrays

$array_asociativo = array (

    "array1" => $array1,
    "array2" => $array2,
    "array3" => $array3
);

//crear array indexado 

$array_indexado = array($array1,$array2,$array3);

// Mostrar el array asociativo
echo "Array asociativo:<br>";
print_r($array_asociativo);

// Mostrar el array indexado
echo "<br>Array indexado:<br>";
print_r($array_indexado);


?>