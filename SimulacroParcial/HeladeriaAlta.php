<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sabor']) && isset($_POST['precio']) && isset($_POST['tipo']) && isset($_POST['vaso']) && isset($_POST['stock'])) {
        // Obtener los datos del formulario
        $sabor = $_POST['sabor'];
        $precio = $_POST['precio'];
        $tipo = $_POST['tipo'];
        $vaso = $_POST['vaso'];
        $stock = $_POST['stock'];

        if ($tipo !== 'agua' && $tipo !== 'crema') {
            echo "El tipo debe ser 'agua' o 'crema'.";
            exit;
        }

        // Validar que el vaso sea "Cucurucho" o "Plástico"
        if ($vaso !== 'cucurucho' && $vaso !== 'plastico') {
            echo "El tipo de vaso debe ser 'Cucurucho' o 'Plástico'.";
            exit;
        }

        // Leer el contenido del archivo heladeria.json
        $heladeria_json = file_get_contents('heladeria.json');

        // Decodificar el contenido JSON a un array asociativo
        $heladeria_array = json_decode($heladeria_json, true);

        // Inicializar el array si es null
        if ($heladeria_array === null) {
            $heladeria_array = [];
        }

        $helado_existe = false;

        foreach ($heladeria_array as &$helado) {
            if ($helado['sabor'] === $sabor && $helado['tipo'] === $tipo) {
                // Actualizar el precio y sumar al stock existente
                $helado['precio'] = $precio;
                $helado['stock'] += $stock;
                $helado_existe = true;
                break;
            }
        }

        if (!$helado_existe) {
            $proximo_id = count($heladeria_array) + 1;

            $nuevo_helado = [
                'id' => $proximo_id,
                'sabor' => $sabor,
                'precio' => $precio,
                'tipo' => $tipo,
                'vaso' => $vaso,
                'stock' => $stock
            ];

            $heladeria_array[] = $nuevo_helado;
        }

        // Codificar el array actualizado a formato JSON
        $nuevo_contenido_json = json_encode($heladeria_array, JSON_PRETTY_PRINT);

        // Guardar el contenido JSON en el archivo heladeria.json
        file_put_contents('heladeria.json', $nuevo_contenido_json);

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagen_nombre = $sabor . '_' . $tipo . '.jpg'; // Nombre de la imagen
            $imagen_ruta_temporal = $_FILES['imagen']['tmp_name']; // Ruta temporal de la imagen subida
            $imagen_ruta_destino = 'ImagenesDeHelados/2024/' . $imagen_nombre; // Ruta de destino de la imagen

            // Crear la carpeta si no existe
            if (!file_exists('ImagenesDeHelados/2024/')) {
                mkdir('ImagenesDeHelados/2024/', 0777, true); // Crea la carpeta recursivamente
            }
            // Mover la imagen del directorio temporal al directorio de destino
            if (move_uploaded_file($imagen_ruta_temporal, $imagen_ruta_destino)) {
                echo "Alta exitosa. Imagen del helado guardada como $imagen_nombre";
            } else {
                echo "Error al mover la imagen del helado.";
            }
        } else {
            echo "Alta exitosa, pero no se subió ninguna imagen.";
        }
    } else {
        echo "Todos los campos son requeridos.";
    }
} else {
    echo "Esta página solo responde a solicitudes POST.";
}
?>
