<?php
include('app/config.php');
include('layout/session.php');

// Obtener todos los autos
$sql_autos = "SELECT autos.*, marcas.nombre_marca 
FROM autos 
INNER JOIN marcas ON autos.id_marca = marcas.id_marca";
$stmt_autos = $conn->prepare($sql_autos);
$stmt_autos->execute();
$autos = $stmt_autos->fetchAll(PDO::FETCH_ASSOC);

// Obtener todas las marcas
$sql_marcas = "SELECT * FROM marcas";
$stmt_marcas = $conn->prepare($sql_marcas);
$stmt_marcas->execute();
$marcas = $stmt_marcas->fetchAll(PDO::FETCH_ASSOC);