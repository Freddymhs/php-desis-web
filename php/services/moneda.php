<?php
function get_monedas(): string
{
    try {
        $pdo = getConnection();
        $data = $pdo->query('SELECT * FROM monedas ORDER BY id ASC')->fetchAll();
        return json_encode($data);
    } catch (PDOException $e) {
        throw $e;
    }
}

