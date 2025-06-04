<?php
$conexion = getConnection();
$stmt = $conexion->prepare('SELECT * FROM bodegas ORDER BY id ASC');
$stmt->execute();
$bodegas = $stmt->fetchAll();
echo '<pre>';
print_r($bodegas);
echo '</pre>';
?>