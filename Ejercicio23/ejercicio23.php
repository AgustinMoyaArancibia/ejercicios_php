<?php

class Usuario
{
    private $nombre;
    private $clave;
    private $mail;
    private $fecha_registro;
    private $id;

    // Constructor
    public function __construct($id,$nombre, $clave, $mail,$fecha_registro)
    {   $this->id = $id;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->fecha_registro =$fecha_registro ;
    }

/*     // Método estático para buscar un usuario por su correo electrónico
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
    } */

    // Getters para acceder a las propiedades privadas

    public function getId()
    {
        return $this->id;
    }
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

    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }


      // Método para serializar el objeto Usuario a formato JSON
      public function toJson()
      {
          return json_encode([
              'id' => $this->id,
              'nombre' => $this->nombre,
              'clave' => $this->clave,
              'mail' => $this->mail,
              'fecha_registro' => $this->fecha_registro
          ]);
      }

}

?>