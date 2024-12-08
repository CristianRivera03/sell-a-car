<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo = $_POST['modelo'];
    $year = $_POST['year'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $id_marca = $_POST['id_marca'];

    // Manejo de subida de imagen
    $imagen = '';
    if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['name'] !== '') {
        // Especificamos la ruta dentro de la carpeta uploads (sin subcarpeta)
        $ruta_imagen = 'uploads/';
        $nombre_imagen = uniqid() . "_" . $_FILES['imagen']['name'];
        $ruta_completa = $ruta_imagen . $nombre_imagen;

        // Verificamos si la carpeta existe
        if (!is_dir($ruta_imagen)) {
            mkdir($ruta_imagen, 0777, true);  // Creamos la carpeta uploads si no existe
        }

        // Subimos la imagen
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_completa)) {
            $imagen = $ruta_completa;
        } else {
            echo "Error al subir la imagen.";
        }
    }

    // Insertar el auto en la base de datos
    $sql = "INSERT INTO autos (modelo, year, precio, descripcion, id_marca, imagen) 
            VALUES (:modelo, :year, :precio, :descripcion, :id_marca, :imagen)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':id_marca', $id_marca);
    $stmt->bindParam(':imagen', $imagen);

    if ($stmt->execute()) {
        header("Location: index.php?mensaje=auto_agregado");
    } else {
        echo "Error al guardar el auto.";
    }
}
?>