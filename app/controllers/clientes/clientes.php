<?php
include("../../config.php"); // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'] ?? null; // Campo opcional
    $direccion = $_POST['direccion'] ?? null; // Campo opcional

    // Insertar cliente en la tabla
    $sql = "INSERT INTO clientes (nombre, telefono, direccion) VALUES (:nombre, :telefono, :direccion)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':direccion', $direccion);

    if ($stmt->execute()) {
        header("Location:" . $URL . " /registrar_cliente.php");
        exit;
    } else {
        header('Location: ../../registrar_cliente.php?error=Error al registrar el cliente');
        exit;
    }
}
?>