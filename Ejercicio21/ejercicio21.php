<?php

class Usuario
{

    private $nombre;
    private $clave;
    private $mail;




    // Métodos para acceder a las propiedades privadas
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


    public function __construct($nombre, $clave, $mail)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
    }

    public static function cargarUsuariosDesdeCSV()
    {


        $usuarios = array(); //creo array de usuarios

        $archivo = fopen('usuarios.csv', 'r');

        fgetcsv($archivo);

        while (($linea = fgetcsv($archivo)) !== false) // mientra se distinto de false se ejectuta, lee cada linea del archivo csv 
        {

            $usuario = new Usuario($linea[0], $linea[1], $linea[2]); //creo objeto usuario

            // $usuarios[] = $usuario;

            array_push($usuarios, $usuario);
        }



        fclose($archivo); //cierra archivo

        return $usuarios;
    }

    // Método estático para generar una lista HTML de usuarios
    public static function generarListaUsuarios()
    {
        $usuarios = self::cargarUsuariosDesdeCSV(); // Carga los usuarios desde el archivo CSV
        $lista = '<ul>'; // Inicia la lista

        // Itera sobre cada usuario y genera un elemento <li> para cada uno
        foreach ($usuarios as $usuario) {
            // Agrega el nombre, clave y correo electrónico del usuario como elementos <li>
            $lista .= '<li>';
            $lista .= 'Nombre: ' . $usuario->getNombre() . ', ';
            $lista .= 'Clave: ' . $usuario->getClave() . ', ';
            $lista .= 'Correo electrónico: ' . $usuario->getMail();
            $lista .= '</li>';
        }

        $lista .= '</ul>'; // Cierra la lista

        return $lista; // Devuelve la lista de usuarios en formato HTML
    }
}
