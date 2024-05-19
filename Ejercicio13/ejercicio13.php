<!-- Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán: 1 si la palabra
pertenece a algún elemento del listado.
0 en caso contrario. -->

<?php

function validarPalabra( $palabra , $max){

     // Lista de palabras válidas
     $palabras_validas = array("Recuperatorio", "Parcial", "Programacion");

    
     // Validar la longitud de la palabra
     if (strlen($palabra) > $max) {
        return 0; // La longitud de la palabra excede el límite máximo
    }

    if(in_array($palabra , $palabras_validas)){
        return 1;

    }else
    {
        return 0;
    }
}
        // Ejemplo de uso
    $palabra = "Parcial";
    $max = 4;
    $resultado = validarPalabra($palabra, $max);

    if ($resultado == 1) {
        echo "La palabra '$palabra' es válida y su longitud no excede $max caracteres.";
    } else {
        echo "La palabra '$palabra' no es válida o su longitud excede $max caracteres.";
    }



?>