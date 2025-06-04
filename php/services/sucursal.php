<?php
namespace Services;

use PDOException;
require_once __DIR__ . '/../../database/config.php';

class SucursalService
{
    public function get_sucursales(): string
    {
        try {
            $pdo = getConnection();
            $data = $pdo->query('SELECT * FROM sucursales ORDER BY id ASC')->fetchAll();
            return json_encode([
                'success' => true,
                'data' => $data
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
