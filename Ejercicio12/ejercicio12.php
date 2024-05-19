<!-- Aplicación Nº 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”. -->

<?php

function invertirPalabra( $array){

    $longitud = count($array); //esto me devuelve la cantidad de elementos del array
    $inicio = 0 ; // declaro el punto de partida del array 
    $fin = $longitud - 1 ; //la cantidad de elementos - 1 es la ultima posicion del array


    while($inicio <  $fin)
    {
        $temp = $array[$inicio]; // la posicion cero del array se la guardo a temp
        $array[$inicio] =  $array[$fin]; // el ultimo elemento de la ultima posicion se guarda al inicio
        $array[$fin] = $temp ; //guarda la variable la posicion cero guarda arriba al final del array

        $inicio++; //incremento el indice para que se repita en la proxima posicion
        $fin--; //decremento para que pase al anteultima posicion 

    }
    return implode('', $array); //devuelve array en formato string 
}
// Ejemplo de uso
$palabra = "HOLA    TAROLA";
$caracteres = str_split($palabra); // Convertir la palabra en un array de caracteres
$palabra_invertida = invertirPalabra($caracteres);
echo "Palabra original: $palabra<br>";
echo "Palabra invertida: $palabra_invertida";






?>