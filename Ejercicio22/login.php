<?php

include 'C:\xampp\htdocs\Ejercicio22\ejercicio22.php';

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $clave = $_POST['clave'];
    $mail = $_POST['mail'];

    $usuario = Usuario::buscarPorMail($mail);


   if ($usuario) {
        // Verificar si la clave proporcionada coincide con la registrada para el usuario
        if ($usuario->verificarClave($clave)) {
            echo "Verificado";
        } else {
            echo "Error en los datos";
        }
    } else {
        echo "Usuario no registrado";
    }
}
