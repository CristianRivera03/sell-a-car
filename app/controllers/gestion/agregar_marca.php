<?php
include("../../config.php");  // Asegúrate de que este archivo contenga la conexión a la base de datos
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_marca = $_POST['nombre_marca'];

    // Insertar la nueva marca en la base de datos con PDO
    $sql = "INSERT INTO marcas (nombre_marca) VALUES (:nombre_marca)";
    $stmt = $pdo->prepare($sql);  // Aquí usamos $pdo en lugar de $conn
    $stmt->bindParam(':nombre_marca', $nombre_marca);

    if ($stmt->execute()) {
        header("Location:" .$URL."/gestion.php");
    } else {
        echo "Error al agregar la marca.";
    }
}
?>