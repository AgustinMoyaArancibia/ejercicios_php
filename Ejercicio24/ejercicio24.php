<?php

class Usuario
{
    private $id;
    private $nombre;
    private $clave;
    private $mail;
    private $fecha_registro;

    public function __construct($id, $nombre, $clave, $mail, $fecha_registro)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->fecha_registro = $fecha_registro;
    }

    // Método para cargar usuarios desde el archivo JSON
    public static function cargarUsuariosDesdeJSON()
    {
        $usuarios = array(); // creo array
        $json_data = file_get_contents('usuarios.json'); //lee el contendido json y lo de vuelve en cadena de caracteres
        
        $data = json_decode($json_data, true);
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            // Hubo un error al decodificar el JSON
            echo 'Error al decodificar JSON: ' . json_last_error_msg();
        }
   
        if (!empty($data)) {
            foreach ($data as $usuario_data) {
                $usuario = new Usuario(
                    $usuario_data['id'],
                    $usuario_data['nombre'],
                    $usuario_data['clave'],
                    $usuario_data['mail'],
                    $usuario_data['fecha_registro']
                );
                $usuarios[] = $usuario;
            }
        }

        return $usuarios;
    }

    // Método para obtener los datos de un usuario como un array asociativo
    public function toArray()
    {
        return array(
            'id' => $this->id,
            'nombre' => $this->nombre,
            'clave' => $this->clave,
            'mail' => $this->mail,
            'fecha_registro' => $this->fecha_registro
        );
    }
}

?>