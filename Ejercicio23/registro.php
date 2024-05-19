<?php

include 'C:\xampp\htdocs\Ejercicio23\ejercicio23.php';

// Verificar si se recibieron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario por POST
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $mail = $_POST['mail'];

    // Generar un ID único emulado o aleatorio
    $id = rand(1, 10000); // Número aleatorio entre 1 y 10,000

    // Obtener la fecha actual
    $fecha_registro = date("Y-m-d H:i:s");

    // Crear un objeto Usuario con los datos recibidos
    $usuario = new Usuario($id, $nombre, $clave, $mail, $fecha_registro);

    // Guardar los datos en usuarios.json
    $archivo = fopen('usuarios.json', 'a');
    fwrite($archivo, $usuario->toJson() . PHP_EOL);
    fclose($archivo);


    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $ruta_destino = 'Usuario/Fotos/' . $_FILES['imagen']['name'];
     
        // Crear la carpeta si no existe
        if (!file_exists('Usuario/Fotos/')) {
            mkdir('Usuario/Fotos/', 0777, true); // Crea la carpeta recursivamente
        }
        
        // Mover el archivo de imagen al servidor
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino);
        echo 'se subio el archivo en: ', $ruta_destino;

        
    }else
    {
        echo $ruta_destino;
        echo 'no se pudo subir archivo <br>';
    }
   
    // Retornar un mensaje indicando si se agregó correctamente
    if ($archivo) {
        echo "El usuario se agregó correctamente.";
    } else {
        echo "Error al agregar el usuario.";
    }
}


?>