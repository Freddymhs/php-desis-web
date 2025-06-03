<?php
$dsn = "pgsql:host=localhost;port=5432;dbname=registro_productos;";
$user = "postgres";
$password = "postgres";

try {
    $pdo = new PDO($dsn, $user, $password);
    echo "Conectado a la base de datos.\n";

    // Limpiar tablas en orden correcto para evitar errores de FK
    $pdo->exec("TRUNCATE TABLE productos, sucursales, monedas, bodegas RESTART IDENTITY CASCADE;");
    echo "✓ Tablas limpiadas\n";

    // Insertar bodegas
    $pdo->exec("INSERT INTO bodegas (nombre) VALUES
        ('Bodega Central'),
        ('Bodega Norte'),
        ('Bodega Sur');
    ");
    echo "✓ Datos insertados en bodegas\n";

    // Insertar monedas
    $pdo->exec("INSERT INTO monedas (nombre, simbolo) VALUES
        ('Peso Chileno', 'CLP'),
        ('Dólar Americano', 'USD'),
        ('Euro', 'EUR');
    ");
    echo "✓ Datos insertados en monedas\n";

    // Insertar sucursales
    $pdo->exec("INSERT INTO sucursales (nombre, bodega_id) VALUES
        ('Sucursal Centro', 1),
        ('Sucursal Norte', 2),
        ('Sucursal Sur', 3);
    ");
    echo "✓ Datos insertados en sucursales\n";

    echo "\nSeed completado!\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>
