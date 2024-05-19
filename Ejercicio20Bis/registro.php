<?php
   
   include 'C:\xampp\htdocs\Ejercicio20Bis\ejercicio20bis.php';

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $mail = $_POST['mail'];

    // Crear un nuevo objeto Usuario con los datos recibidos utilizando el constructor de la clase Usuario.
    $nuevoUsuario = new Usuario($nombre, $clave, $mail);

    // Llamar al método guardarEnCSV() para agregar el usuario al archivo CSV y obtener el resultado.
    $resultado = $nuevoUsuario->guardarEnCSV();

    // Verificar el resultado de la operación y mostrar un mensaje apropiado.
    if ($resultado) {
        echo "El usuario se agregó correctamente.";
        var_dump($nuevoUsuario) ;
    } else {
        echo "Error al agregar el usuario.";
    }
}



?>

