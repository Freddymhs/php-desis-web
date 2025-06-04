<?php
namespace Services;

use PDOException;
use stdClass;
require_once __DIR__ . '/../../database/config.php';

class ProductoService
{
    public function get_productos(): string
    {
        try {
            $pdo = getConnection();
            $data = $pdo->query('SELECT * FROM productos ORDER BY id ASC')->fetchAll();
            return json_encode($data);
        } catch (PDOException $e) {
            return json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function insert_producto(
        $codigo,
        $nombre,
        $bodega,
        $sucursal,
        $moneda,
        $precio,
        $materiales,
        $descripcion
    ) {
        try {
            $pdo = getConnection();
            $stmt = $pdo->prepare('
                INSERT INTO productos (codigo_producto, nombre, bodega, sucursal, moneda, precio, materiales, descripcion)
                VALUES (:codigo, :nombre, :bodega, :sucursal, :moneda, :precio, :materiales, :descripcion)
            ');

            $stmt->execute([
                ':codigo' => $codigo,
                ':nombre' => $nombre,
                ':bodega' => $bodega,
                ':sucursal' => $sucursal,
                ':moneda' => $moneda,
                ':precio' => $precio,
                ':materiales' => $materiales,
                ':descripcion' => $descripcion,
            ]);

            $id = $pdo->lastInsertId();

            $resultado = new stdClass();
            $resultado->success = true;
            $resultado->id = $id;
            $resultado->codigo_producto = $codigo;
            $resultado->nombre = $nombre;
            $resultado->bodega = $bodega;
            $resultado->sucursal = $sucursal;
            $resultado->moneda = $moneda;
            $resultado->precio = $precio;
            $resultado->materiales = $materiales;
            $resultado->descripcion = $descripcion;
            $resultado->message = 'Producto insertado correctamente';

            return $resultado;

        } catch (PDOException $e) {
            return json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}