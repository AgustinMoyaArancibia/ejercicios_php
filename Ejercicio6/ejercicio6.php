<?php

/*
 Aplicación Nº 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
 */

 
    $numeros = array( rand(1,10),rand(1,10),rand(1,10),rand(1,10),rand(1,10)   );

    $promedio = array_sum($numeros) / count($numeros);

    if($promedio > 6 )
    {
        echo " el promedio es mayor a 6 : $promedio ";
    }
    else if($promedio = 6)
    {
        echo " el promedio es igual a 6 : $promedio ";
    }
    else
    {
        echo " el promedio es menor a 6 : $promedio ";
    }


?>