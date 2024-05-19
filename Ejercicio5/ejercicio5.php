<?php
// Definir el valor de $num
$num = 37;

// Verificar si el número está en el rango de 20 a 60
if ($num >= 20 && $num <= 60) {
    // Arrays para los nombres de los números
    $unidades = ["", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve"];
    $decenas = ["", "diez", "veinte", "treinta", "cuarenta", "cincuenta", "sesenta"];

    // Obtener la unidad y la decena del número
    $unidad = $num % 10;
    $decena = floor($num / 10);

    // Construir el nombre del número
    $nombre_numero = $decenas[$decena];

    if ($unidad > 0 && $decena > 1) {
        $nombre_numero .= " y " . $unidades[$unidad];
    } elseif ($unidad > 0) {
        $nombre_numero = $unidades[$unidad];
    }

    // Mostrar el resultado
    echo "El nombre del número es: $nombre_numero";
} else {
    echo "El número no está en el rango de 20 a 60.";
}
?>
