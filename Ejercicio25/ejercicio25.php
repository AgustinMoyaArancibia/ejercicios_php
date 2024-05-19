<?php

class Producto
{

    public  $id ;
    public  $codigo_barra;
    public  $nombre;
    public  $tipo;
    public  $stock;
    public  $precio;

    public function __construct($codigo_barra, $nombre, $tipo, $stock, $precio)
    {
        // Generar un ID autoincremental emulado (en una aplicación real se utilizaría una base de datos)
        $this->id =rand(1, 10000);
        $this->codigo_barra = $codigo_barra;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->stock = $stock;
        $this->precio = $precio;
    }


    //verificarExistencia
    public static function verificarExistencia($producto)
    {
        $productos_json = file_get_contents('productos.json');

        $productos_array = json_decode($productos_json, true);

        if (!empty($productos_array)) {
            foreach ($productos_array as $producto_guardado) {
                if ($producto_guardado['codigo_barra'] === $producto->codigo_barra) {
                    return true;
                }
            }
        }

        return false;
    }




    //actualizarStock
    public static function actualizarStock($producto)
    {
        $productos_json = file_get_contents('productos.json');

        $productos_array = json_decode($productos_json, true);

        if (!empty($productos_array)) {
            foreach ($productos_array as &$producto_guardado) {
                if ($producto_guardado['codigo_barra'] === $producto->codigo_barra) {
                    $producto_guardado['stock'] += $producto->stock;
                    break; // Se detiene el bucle al encontrar el producto
                }
            }

            // Codificar nuevamente los datos y guardarlos en el archivo JSON
            $productos_json = json_encode($productos_array, JSON_PRETTY_PRINT);
            file_put_contents('productos.json', $productos_json);
        }
    }

    //agregarNuevoProducto
    public static function agregarNuevoProducto($producto)
    {
        $productos_json = file_get_contents('productos.json');

        $productos_array = json_decode($productos_json, true);

        // Agregar el nuevo producto al array
        $productos_array[] = array(
            'id' => $producto->id,
            'codigo_barra' => $producto->codigo_barra,
            'nombre' => $producto->nombre,
            'tipo' => $producto->tipo,
            'stock' => $producto->stock,
            'precio' => $producto->precio
        );

        // Codificar nuevamente los datos y guardarlos en el archivo JSON
        $productos_json = json_encode($productos_array, JSON_PRETTY_PRINT);
        file_put_contents('productos.json', $productos_json);
    }
}
