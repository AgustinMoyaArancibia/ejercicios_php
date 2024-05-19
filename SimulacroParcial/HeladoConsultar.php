<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sabor']) && isset($_POST['tipo'])) {
        $sabor = $_POST['sabor'];
        $tipo = $_POST['tipo'];
    }

    // Leer el contenido del archivo heladeria.json
    $heladeria_json = file_get_contents('heladeria.json');

    // Decodificar el contenido JSON a un array asociativo
    $heladeria_array = json_decode($heladeria_json, true);

    $encontrado = false;

    // Recorrer el array de helados para buscar coincidencias
    foreach ($heladeria_array as $helado) {
        if ($helado['sabor'] === $sabor && $helado['tipo'] === $tipo) {
            $encontrado = true;
            break;
        }
    
    }
        // Generar la respuesta
        if ($encontrado) {
            echo "existe";
        } else {
            echo "No existe un helado de '$sabor' en el tipo '$tipo'.";
        }
}
