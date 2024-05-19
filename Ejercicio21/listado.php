<?php

include 'C:\xampp\htdocs\Ejercicio21\ejercicio21.php';


// Verifica si se recibió el parámetro "listado" por GET
if (isset($_GET['listado']) && $_GET['listado'] === 'usuarios') {
    // Carga los usuarios desde el archivo CSV utilizando el método estático de la clase Usuario

    $listaUsuariosHTML = Usuario::generarListaUsuarios(); // con  ul
    echo $listaUsuariosHTML;

 /*    $usuariosS = Usuario::cargarUsuariosDesdeCSV();

    if (!empty($usuariosS)) {
        // Itera sobre cada usuario y muestra su información
        foreach ($usuariosS as $usuario) {
            echo "Nombre: " . $usuario->getNombre() . "<br>";
            echo "Clave: " . $usuario->getClave() . "<br>";
            echo "Mail: " . $usuario->getMail() . "<br><br>";
        }
    } else {
        echo "No se encontraron usuarios.";
    } recorriendo la lista */ 


   
   /* echo json_encode($usuariosS); con atributos publicos */ 
} else {
    // Retorna un mensaje de error si el parámetro "listado" no es válido
    echo "Error: No se ha especificado un listado válido.";
    error_reporting(E_ALL);
}


