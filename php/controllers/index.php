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
    $result = $service->get_bodegas();
    echo json_encode($result);
    exit;
}

function get_monedas()
{
    header('Content-Type: application/json');
    $service = new MonedaService();
    $result = $service->get_monedas();
    echo json_encode($result);
    exit;
}


function get_sucursales()
{
    header('Content-Type: application/json');
    $service = new SucursalService();
    $result = $service->get_sucursales();
    echo json_encode($result);
    exit;
}

function validateForm($data)
{
    $code = $data['code'];
    $name = $data['name'];
    $price = $data['price'];
    $store = $data['store'];
    $office = $data['office'];
    $currency = $data['currency'];
    $description = $data['description'];

    $materiales = isset($data['material']) ? $data['material'] : [];


    // todo -> Código: obligatorio, regex, longitud 5-15, único
    $service = new ProductoService();
    $res = $service->producto_code_is_unique((string) $code);
    if (!$res['isUniqueProduct']) {
        echo json_encode(['success' => false, 'message' => 'El código del producto ya está registrado']);
        exit;
    }
    if (empty($code)) {
        echo json_encode(['success' => false, 'message' => 'El código no puede estar vacío.']);
        exit;
    }
    if (!preg_match('/^[A-Za-z0-9]{5,15}$/', $code)) {
        echo json_encode(['success' => false, 'message' => 'El código debe tener entre 5 y 15 caracteres alfanuméricos.']);
        exit;
    }

    // todo -> Nombre: obligatorio, longitud 2-50
    if (empty($name)) {
        echo json_encode(['success' => false, 'message' => 'El nombre no puede estar vacío.']);
        exit;
    }
    if (strlen($name) < 2 || strlen($name) > 50) {
        echo json_encode(['success' => false, 'message' => 'El nombre debe tener entre 2 y 50 caracteres.']);
        exit;
    }

    // todo -> Precio: obligatorio, regex número positivo 2 decimales
    if (empty($price)) {
        echo json_encode(['success' => false, 'message' => 'El precio no puede estar vacío.']);
        exit;
    }

    if (!preg_match('/^\d+(\.\d{1,2})?$/', $price)) {
        echo json_encode(['success' => false, 'message' => 'El precio debe ser un número positivo con hasta 2 decimales.']);
        exit;
    }
    if ($price > 99999999.99) {
        echo json_encode(['success' => false, 'message' => 'El precio no puede superar los 99,999,999.99.']);
        exit;
    }


    // todo -> Materiales: mínimo 2 seleccionados
    if (count($materiales) < 2) {
        echo json_encode(['success' => false, 'message' => 'Debes seleccionar al menos 2 materiales']);
        exit;
    }

    // todo -> Bodega: obligatorio, existe en BD
    if (empty($store)) {
        echo json_encode(['success' => false, 'message' => 'El bodega no puede estar vacío.']);
        exit;
    }

    // todo -> Sucursal: obligatorio, pertenece a bodega seleccionada
    if (empty($office)) {
        echo json_encode(['success' => false, 'message' => 'El sucursal no puede estar vacío.']);
        exit;
    }

    // todo -> Moneda: obligatorio, existe en BD
    if (empty($currency)) {
        echo json_encode(['success' => false, 'message' => 'El moneda no puede estar vacío.']);
        exit;
    }

    // todo -> Descripción: obligatorio, longitud 10-1000
    if (!preg_match('/^[A-Za-z0-9\s\.\,\;\:\-\(\)\=\?\!\*\_]{10,1000}$/', $description)) {
        echo json_encode(['success' => false, 'message' => 'La descripción debe tener entre 10 y 1000 caracteres.']);
        exit;
    }
}
function insert_producto(array $data)
{


    validateForm($data);

    $service = new ProductoService();
    $result = $service->insert_producto(
        $data['code'],
        $data['name'],
        $data['store'],
        $data['office'],
        $data['currency'],
        $data['price'],
        isset($data['material']) ? $data['material'] : [],
        $data['description']
    );
    echo json_encode($result);
    exit;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['get_bodegas'])) {
        get_bodegas();
    }
    if (!empty($_POST['get_monedas'])) {
        get_monedas();
    }
    if (!empty($_POST['get_sucursales'])) {
        get_sucursales();
    }
    if (!empty($_POST['producto_code_is_unique'])) {
        producto_code_is_unique($_POST['code']);
    }
    if (!empty($_POST['insert_producto'])) {
        insert_producto($_POST);
    }
}
?>