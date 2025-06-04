<?php
function get_bodegas(): string
{
    try {
        $pdo = getConnection();
        $data = $pdo->query('SELECT * FROM bodegas ORDER BY id ASC')->fetchAll();
        return json_encode($data);
    } catch (PDOException $e) {
        throw $e;
    }
}


