<?php
namespace Services;

use PDOException;
require_once __DIR__ . '/../../database/config.php';

class MonedaService
{
    public function get_monedas(): string
    {
        try {
            $pdo = getConnection();
            $data = $pdo->query('SELECT * FROM monedas ORDER BY id ASC')->fetchAll();
            return json_encode($data);
        } catch (PDOException $e) {
            return json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
