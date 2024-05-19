<?php
    class Usuario {

        public $nombre;
        public $clave ;
        public $mail;


        public function __construct($nombre,$clave,$mail){

            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->mail = $mail;

        }


        public function guardarEnCSV(){

            $linea = $this->nombre . ',' . $this->clave . ',' . $this->mail . "\n";

            // FILE_APPEND se utiliza para agregar la línea al final del archivo sin sobrescribir su contenido existente.
            file_put_contents('usuarios.csv', $linea, FILE_APPEND);


                // Finalmente, se verifica si la operación de escritura fue exitosa.
             // Si el archivo usuarios.csv existe después de la escritura, se retorna true, indicando que el usuario se agregó correctamente.
             // De lo contrario, se retorna false, indicando un error.
             return file_exists('usuarios.csv');
        }

    }



?>