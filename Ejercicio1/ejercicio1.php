<?php

$suma = 0;
$contador = 0;

while($suma <= 1000)
{
    $contador++;
    $suma += $contador;
    echo "suma : , $suma <br>";
}

echo "suma final : , $suma";
?>