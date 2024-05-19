
<?php
    include_once 'C:\xampp\htdocs\Ejercicio25\ejercicio25.php';
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $codigo_barra = $_POST['codigo_barra'];
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];


        $producto = new Producto( $codigo_barra,$nombre,$tipo,$stock,$precio );

        if(Producto::verificarExistencia($producto) ){

            Producto::actualizarStock($producto);
            echo 'Actualizado';

        }else{
            Producto::agregarNuevoProducto($producto);
            echo'ingresado';

        }




    }else{
        echo 'no se pudo agregar '; 


    }



?>