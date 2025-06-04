<?php
require_once __DIR__ . '/../services/sucursal.php';
require_once __DIR__ . '/../services/bodega.php';
require_once __DIR__ . '/../services/moneda.php';
require_once __DIR__ . '/../services/producto.php';

use Services\SucursalService;
use Services\BodegaService;
use Services\MonedaService;
use Services\ProductoService;




function get_bodegas()
{
    header('Content-Type: application/json');
    $service = new BodegaService();
    $result = $service->get_bodegas(); // ahora es array
    echo json_encode($result);         // y aquí lo conviertes a JSON
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['get_bodegas'])) {
        get_bodegas();
    }
}

?>