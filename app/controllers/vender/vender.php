<?php
$sql_autos = "SELECT * FROM autos WHERE id_auto NOT IN (SELECT id_auto FROM autos_vendidos)";
$stmt_autos = $pdo->prepare($sql_autos);
$stmt_autos->execute();
$autos = $stmt_autos->fetchAll(PDO::FETCH_ASSOC);

// Obtener los clientes registrados
$sql_clientes = "SELECT * FROM clientes";
$stmt_clientes = $pdo->prepare($sql_clientes);
$stmt_clientes->execute();
$clientes = $stmt_clientes->fetchAll(PDO::FETCH_ASSOC);

// Obtener las ventas realizadas
$sql_ventas = "SELECT v.id_venta, v.fecha_venta, v.precio_venta, c.nombre AS nombre_cliente, a.modelo, a.year
FROM autos_vendidos v
INNER JOIN clientes c ON v.id_cliente = c.id_cliente
INNER JOIN autos a ON v.id_auto = a.id_auto";
$stmt_ventas = $pdo->prepare($sql_ventas);
$stmt_ventas->execute();
$ventas = $stmt_ventas->fetchAll(PDO::FETCH_ASSOC);