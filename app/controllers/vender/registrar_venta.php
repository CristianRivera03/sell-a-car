<?php
include("../../config.php"); // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_auto = $_POST['id_auto'];
    $precio_venta = $_POST['precio_venta'];
    $fecha_venta = date('Y-m-d'); // Fecha actual

    // Insertar la venta en la tabla autos_vendidos
    $sql = "INSERT INTO autos_vendidos (id_auto, id_cliente, fecha_venta, precio_venta)
            VALUES (:id_auto, :id_cliente, :fecha_venta, :precio_venta)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_auto', $id_auto);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->bindParam(':fecha_venta', $fecha_venta);
    $stmt->bindParam(':precio_venta', $precio_venta);

    if ($stmt->execute()) {
        // Redirigir a la página de ventas con un mensaje de éxito
        $_SESSION['nombre_cliente'] = $cliente_nombre;
        header("Location:" . $URL . " /vender.php");
        exit;
    } else {
        echo "Error al registrar la venta.";
    }
}
?>