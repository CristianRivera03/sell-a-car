<?php
// Obtener el ID del auto desde la URL
$id_auto = $_GET['id_auto'];

// Obtener los detalles del auto con PDO
$sql_auto = "SELECT * FROM autos WHERE id_auto = :id_auto";
$stmt_auto = $pdo->prepare($sql_auto); // Usamos $pdo en lugar de $conn
$stmt_auto->bindParam(':id_auto', $id_auto, PDO::PARAM_INT);
$stmt_auto->execute();
$auto = $stmt_auto->fetch(PDO::FETCH_ASSOC);

// Obtener todas las marcas para el select
$sql_marcas = "SELECT * FROM marcas";
$stmt_marcas = $pdo->prepare($sql_marcas); // Usamos $pdo en lugar de $conn
$stmt_marcas->execute();
$marcas = $stmt_marcas->fetchAll(PDO::FETCH_ASSOC);
