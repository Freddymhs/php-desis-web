<?php
function get_sucursales(): string
{
    try {
        $pdo = getConnection();
        $data = $pdo->query('SELECT * FROM sucursales ORDER BY id ASC')->fetchAll();
        return json_encode($data);
    } catch (PDOException $e) {
        throw $e;
    }
}
