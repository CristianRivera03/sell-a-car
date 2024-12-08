<?php
include('../../config.php'); // Asegúrate de que config.php contiene la conexión PDO y la variable $URL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_auto = $_POST['id_auto'];
    $modelo = $_POST['modelo'];
    $year = $_POST['year'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $id_marca = $_POST['id_marca'];

    // Recuperar la imagen actual
    $imagen = $_POST['imagen_actual'];

    // Manejo de subida de imagen
    if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['name'] !== '') {
        // Ruta del sistema de archivos donde se guardarán las imágenes
        $directorio_subida = __DIR__ . '../../../../uploads/'; // Ruta física para guardar las imágenes
        $nombre_imagen = uniqid() . "_" . $_FILES['imagen']['name'];
        $ruta_completa = $directorio_subida . $nombre_imagen; // Ruta completa del archivo en el sistema de archivos

        // Verificar si el directorio existe, si no, crearlo
        if (!is_dir($directorio_subida)) {
            mkdir($directorio_subida, 0777, true); // Creamos el directorio si no existe
        }

        // Validar que el archivo subido sea una imagen
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['imagen']['type'], $allowed_types)) {
            // Subir la imagen al servidor
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_completa)) {
                // Actualizamos la URL pública de la imagen para la base de datos
                $imagen = $URL . '/uploads/' . $nombre_imagen;
            } else {
                echo "Error al subir la imagen.";
                exit;
            }
        } else {
            echo "El archivo no es una imagen válida.";
            exit;
        }
    }

    // Preparar la consulta SQL para actualizar el auto
    $sql = "UPDATE autos SET 
                modelo = :modelo, 
                year = :year, 
                precio = :precio, 
                descripcion = :descripcion, 
                id_marca = :id_marca, 
                imagen = :imagen 
            WHERE id_auto = :id_auto";

    // Preparar la sentencia
    $stmt = $pdo->prepare($sql);

    // Enlazar los parámetros
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':id_marca', $id_marca);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':id_auto', $id_auto);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir al listado de autos o mostrar un mensaje de éxito
        header("Location: " . $URL . "/gestion.php?mensaje=actualizado");
        exit;
    } else {
        // En caso de error, mostrar mensaje
        echo "Error al actualizar el auto.";
    }
}
?>