<?php
require __DIR__ . '/../php/loaderDotEnv.php';
require __DIR__ . '/../database/db.php';

try {
    $pdo = getConnection();
    echo "Starting seed!\n";

    $pdo->exec("TRUNCATE TABLE productos, sucursales, monedas, bodegas RESTART IDENTITY CASCADE;");
    echo "Removed Tables\n";

    $pdo->exec("INSERT INTO bodegas (nombre) VALUES
        ('Bodega Central'),
        ('Bodega Norte'),
        ('Bodega Sur');
    ");
    echo "Inserted storages\n";

    $pdo->exec("INSERT INTO monedas (nombre, simbolo) VALUES
        ('Peso Chileno', 'CLP'),
        ('Dólar Americano', 'USD'),
        ('Euro', 'EUR');
    ");
    echo "Inserted currencies\n";

    $pdo->exec("INSERT INTO sucursales (nombre, bodega_id) VALUES
        ('Sucursal Centro', 1),
        ('Sucursal Norte', 2),
        ('Sucursal Sur', 3);
    ");
    echo "Inserted offices\n";

    echo "\n Seed Completed!\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
