<?php


namespace Services;

use PDO;
use PDOException;
require_once __DIR__ . '/../../database/config.php';



class MonedaService
{
    public function get_monedas(): array
    {
        try {
            $pdo = getConnection();
            $stmt = $pdo->query('SELECT * FROM monedas ORDER BY id ASC');
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return [
                'success' => true,
                'data' => $data
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }


}
