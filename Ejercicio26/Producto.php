<?php
class Producto
{


    public static function verificarExistencia($codigo_barra)
    {
        $productos_json = file_get_contents('productos.json');

        $productos_array = json_decode($productos_json, true);


        if (!empty($productos_array)) {

            foreach ($productos_array as $prod) {
                if ($prod['codigo_barra'] === $codigo_barra) {
                    return true;
                    break;
                }
            }
        }

        return false;
    }


    public static function verificarStock($codigo_barra, $stock)
    {

        $productos_json = file_get_contents('productos.json');

        $productos_array = json_decode($productos_json, true);


        if (!empty($productos_array)) {

            foreach ($productos_array as &$prod) {
                if ($prod['codigo_barra'] === $codigo_barra && $prod['stock'] >= $stock ) {

                    $prod['stock'] -= $stock;
                    $productos_json = json_encode($productos_array, JSON_PRETTY_PRINT);

                    file_put_contents('productos.json',$productos_json);

                    return true;
                    break;
                }
            }

        
        }

        return false;
    }
}
