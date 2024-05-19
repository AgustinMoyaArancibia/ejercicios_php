<?php

class Usuario
{
    private $nombre;
    private $clave;
    private $mail;

    // Constructor
    public function __construct($nombre, $clave, $mail)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
    }

    // Método estático para buscar un usuario por su correo electrónico
    public static function buscarPorMail($mail)
    {
        // Supongamos que tienes un array de usuarios registrado en algún lugar
        // Aquí lo simularé como una lista estática
        $usuariosRegistrados = array(
            new Usuario("Usuario1", "clave1", "usuario1@example.com"),
            new Usuario("Usuario2", "clave2", "usuario2@example.com"),
            new Usuario("Usuario3", "clave3", "usuario3@example.com")
        );

        // Iteramos sobre la lista de usuarios para buscar uno con el correo electrónico proporcionado
        foreach ($usuariosRegistrados as $usuario) {
            if ($usuario->getMail() === $mail) {
                return $usuario; // Devolvemos el usuario encontrado
            }
        }

        // Si no se encontró ningún usuario con el correo electrónico proporcionado, devolvemos null
        return null;
    }

    // Getters para acceder a las propiedades privadas
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getMail()
    {
        return $this->mail;
    }

    // Método para verificar si la clave proporcionada coincide con la registrada para el usuario
    public function verificarClave($clave)
    {
        return $this->clave === $clave;
    }
}

?>
