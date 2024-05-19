<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $ventas_file = 'ventas_heladeria.json';

    // Verificar si el archivo existe antes de intentar leerlo
    if (!file_exists($ventas_file)) {
        echo json_encode(['error' => 'El archivo de ventas no existe.']);
        exit;
    }

    $ventas_json = file_get_contents($ventas_file);

    // Verificar si el archivo se ha leído correctamente
    if ($ventas_json === false) {
        echo json_encode(['error' => 'No se pudo leer el archivo de ventas.']);
        exit;
    }

    $ventas_array = json_decode($ventas_json, true);

    // Verificar si la decodificación JSON fue exitosa
    if ($ventas_array === null) {
        echo json_encode(['error' => 'No hay registros de ventas.']);
        exit;
    }

    // Obtener parámetros
    $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : null;
    $email = isset($_GET['email']) ? $_GET['email'] : null;
    $fecha_inicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : null;
    $fecha_fin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : null;
    $sabor = isset($_GET['sabor']) ? $_GET['sabor'] : null;
    $vaso = isset($_GET['vaso']) ? $_GET['vaso'] : null;

    $resultado = [];

    // a. Cantidad de Helados vendidos en un día en particular
    if ($fecha !== null) {
        $fecha_consulta = $fecha;
    } else {
        $fecha_consulta = date('Y-m-d', strtotime('-1 day'));
    }
    $cantidad_vendida = 0;
    foreach ($ventas_array as $venta) {
        if (strpos($venta['fecha'], $fecha_consulta) === 0) {
            $cantidad_vendida += $venta['cantidad'];
        }
    }
    $resultado['cantidad_vendida'] = $cantidad_vendida;

    // b. Listado de ventas de un usuario ingresado
    if ($email !== null) {
        $ventas_usuario = array_filter($ventas_array, function($venta) use ($email) {
            return $venta['email'] === $email;
        });
        $resultado['ventas_usuario'] = array_values($ventas_usuario);
    }

    // c. Listado de ventas entre dos fechas ordenado por nombre
    if ($fecha_inicio !== null && $fecha_fin !== null) {
        $ventas_fechas = array_filter($ventas_array, function($venta) use ($fecha_inicio, $fecha_fin) {
            return $venta['fecha'] >= $fecha_inicio && $venta['fecha'] <= $fecha_fin;
        });
        usort($ventas_fechas, function($a, $b) {
            return strcmp($a['email'], $b['email']);
        });
        $resultado['ventas_fechas'] = array_values($ventas_fechas);
    }

    // d. Listado de ventas por sabor ingresado
    if ($sabor !== null) {
        $ventas_sabor = array_filter($ventas_array, function($venta) use ($sabor) {
            return $venta['sabor'] === $sabor;
        });
        $resultado['ventas_sabor'] = array_values($ventas_sabor);
    }

    // e. Listado de ventas por vaso Cucurucho
    if ($vaso === 'Cucurucho') {
        $ventas_cucurucho = array_filter($ventas_array, function($venta) {
            return $venta['tipo'] === 'Cucurucho';
        });
        $resultado['ventas_cucurucho'] = array_values($ventas_cucurucho);
    }

    echo json_encode($resultado, JSON_PRETTY_PRINT);

} else {
    echo json_encode(['error' => 'Esta página solo responde a solicitudes GET']);
}
?>
