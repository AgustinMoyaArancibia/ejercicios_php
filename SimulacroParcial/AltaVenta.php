<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['sabor']) && isset($_POST['tipo']) && isset($_POST['stock'])) {
        $email = $_POST['email'];
        $sabor = $_POST['sabor'];
        $tipo = $_POST['tipo'];
        $stock = intval($_POST['stock']);

        // Leer el contenido del archivo heladeria.json
        $heladeria_json = file_get_contents('heladeria.json');
        $heladeria_array = json_decode($heladeria_json, true);

        // Leer el contenido del archivo ventas_heladeria.json
        $ventas_json = file_get_contents('ventas_heladeria.json');
        $ventas_array = json_decode($ventas_json, true);

        if ($heladeria_array === null) {
            $heladeria_array = [];
        }
        if ($ventas_array === null) {
            $ventas_array = [];
        }

        $vendido = false;
        foreach ($heladeria_array as &$helado) {
            if ($helado['sabor'] === $sabor && $helado['tipo'] === $tipo) {
                if ($helado['stock'] >= $stock) {
                    $helado['stock'] -= $stock;
                    $vendido = true;

                    // Registrar la venta
                    $proximo_id = count($ventas_array) + 1;
                    $fecha = date("Y-m-d_H-i-s"); // Formato de fecha para el nombre de archivo
                    $nueva_venta = [
                        'id' => $proximo_id,
                        'email' => $email,
                        'fecha' => $fecha,
                        'sabor' => $sabor,
                        'tipo' => $tipo,
                        'cantidad' => $stock
                    ];

                    $ventas_array[] = $nueva_venta;

                    // Guardar la venta en ventas_heladeria.json
                    $nueva_venta_json = json_encode($ventas_array, JSON_PRETTY_PRINT);
                    file_put_contents('ventas_heladeria.json', $nueva_venta_json);

                    // Guardar el contenido actualizado en heladeria.json
                    $nuevo_contenido_json = json_encode($heladeria_array, JSON_PRETTY_PRINT);
                    file_put_contents('heladeria.json', $nuevo_contenido_json);

                    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                        $imagen_nombre = $sabor . '_' . $tipo . '_' . $email . '_' . $fecha . '.jpg'; // Nombre de la imagen
                        $imagen_ruta_temporal = $_FILES['imagen']['tmp_name']; // Ruta temporal de la imagen subida
                        $imagen_ruta_destino = 'ImagenesDeLaVenta/2024/' . $imagen_nombre; // Ruta de destino de la imagen
            
                        // Crear la carpeta si no existe
                        if (!file_exists('ImagenesDeLaVenta/2024/')) {
                            mkdir('ImagenesDeLaVenta/2024/', 0777, true); // Crea la carpeta recursivamente
                        }
                        // Mover la imagen del directorio temporal al directorio de destino
                        if (move_uploaded_file($imagen_ruta_temporal, $imagen_ruta_destino)) {
                            echo "Alta exitosa. Imagen del helado guardada como $imagen_nombre.";
                        } else {
                            echo "Error al mover la imagen del helado.";
                        }
                    } else {
                        echo "Alta exitosa, pero no se subió ninguna imagen.";
                    }

                    echo "Venta realizada con éxito.";
                } else {
                    echo "No hay suficiente stock para realizar la venta.";
                }
                break;
            }
        }

        if (!$vendido) {
            echo "No existe el helado especificado.";
        }
    } else {
        echo "Todos los campos son requeridos.";
    }
} else {
    echo "Esta página solo responde a solicitudes POST.";
}
?>
