
<?php

include_once 'C:\xampp\htdocs\Ejercicio26\Producto.php';
include_once 'C:\xampp\htdocs\Ejercicio26\Usuario.php';


class Ventas
{



    public static function realizarVenta($codigo_barra, $stock, $nombre, $clave)
    {
        if (Usuario::VerificarExistencia($nombre, $clave) && Producto::verificarStock($codigo_barra, $stock)) {

            $archivo_ventas = 'ventasRealizadas.json';

            // Verificar si el archivo de ventas existe, si no, crearlo y escribir la primera venta
            if (!file_exists($archivo_ventas)) {
                $venta = array(
                    'nombre' => $nombre,
                    'codigo_barra' => $codigo_barra,
                    'cantidad' => $stock,
                    'fecha_venta' => date("Y-m-d H:i:s")
                );
                $ventas_array = array($venta);
            } else {
                // Obtener el contenido actual del archivo de ventas
                $ventas_json = file_get_contents($archivo_ventas);

                // Decodificar el JSON a un array asociativo
                $ventas_array = json_decode($ventas_json, true);

                // Verificar si la decodificación fue exitosa
                if ($ventas_array === null) {
                    echo "Error al decodificar el archivo de ventas JSON.";
                    return false;
                }

                // Crear el array de datos de la venta
                $venta = array(
                    'nombre' => $nombre,
                    'codigo_barra' => $codigo_barra,
                    'cantidad' => $stock,
                    'fecha_venta' => date("Y-m-d H:i:s")
                );

                // Agregar la venta al array de ventas
                $ventas_array[] = $venta;
            }

            // Convertir el array de ventas a formato JSON
            $ventas_json = json_encode($ventas_array, JSON_PRETTY_PRINT);

            // Guardar el JSON en el archivo
            file_put_contents($archivo_ventas, $ventas_json);

            echo 'Venta realizada';
            return true;
        } else {
            echo 'No se pudo realizar la venta';
            return false;
        }
    }
}



?>
