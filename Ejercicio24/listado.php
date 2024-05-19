<?php

    include 'C:\xampp\htdocs\Ejercicio24\ejercicio24.php' ;

// Verificar si se recibió el parámetro "listado" por GET
if (isset($_GET['listado']) && $_GET['listado'] === 'usuarios') {
    // Cargar los usuarios desde el archivo JSON
    $usuarios = Usuario::cargarUsuariosDesdeJSON();
    echo json_encode($usuarios);
    // Verificar si se cargaron usuarios
    if (!empty($usuarios)) {
        // Retornar los datos de los usuarios en formato JSON
        header('Content-Type: application/json');
        echo json_encode($usuarios);
    } else {
        // Retornar un mensaje de error si no se encontraron usuarios
        echo json_encode(array('error' => 'No se encontraron usuarios.'));
    }
} else {
    // Si no se especifica un listado válido, retornar un mensaje de error
    echo json_encode(array('error' => 'No se ha especificado un listado válido.'));
}

?>