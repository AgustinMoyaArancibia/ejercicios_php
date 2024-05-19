<?php
// Obtener la fecha actual
$fecha_actual = date("Y-m-d H:i:s");
echo "Fecha actual: $fecha_actual <br>";

// Formatos de fecha alternativos
echo "Formato 1: " . date("d/m/Y H:i:s") . "<br>";
echo "Formato 2: " . date("F j, Y, g:i a") . "<br>";
echo "Formato 3: " . date("D M j G:i:s T Y") . "<br>";

// Determinar la estación del año utilizando una estructura selectiva múltiple
$mes_actual = date("n");

switch ($mes_actual) {
    case 1:
    case 2:
    case 12:
        $estacion = "Verano";
        break;
    case 3:
    case 4:
    case 5:
        $estacion = "Otoño";
        break;
    case 6:
    case 7:
    case 8:
        $estacion = "Invierno";
        break;
    case 9:
    case 10:
    case 11:
        $estacion = "Primavera";
        break;
    default:
        $estacion = "No válida";
        break;
}

echo "Estación del año: $estacion";
?>
