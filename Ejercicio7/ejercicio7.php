<?php

    /*
    Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
utilizando las estructuras while y foreach.

    */


  

    $contador = 1; // porque el primer numero impar es 1


    for ($i = 0; $i < 10; $i++) {
        $numeros_impares[$i] = $contador;
        $contador += 2;
       
    }

    echo "<br><strong>Impresión con estructura while:</strong><br>";

    $index = 0;
    while( $index < count($numeros_impares))
    {
        echo "<br> numero : $numeros_impares[$index]";
        $index++;

    }

    echo "<br><strong>Impresión con estructura for:</strong><br>";
    for($i = 0 ; $i < count($numeros_impares) ; $i++)
    {
        echo " <br > numero :  $numeros_impares[$i]";
    }


    echo "<br><strong>Impresión con estructura foreach:</strong><br>";
    foreach ($numeros_impares as $numero) {
        echo $numero . "<br>";
    }



?>