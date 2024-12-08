<?php
include('app/config.php');
include("layout/session.php");
include("app/controllers/agregar/agregar.php");
include("layout/part_one.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Auto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- inicio de formulario -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Agregar Auto</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Año</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="id_marca" class="form-label">Marca</label>
                <select class="form-control" id="id_marca" name="id_marca" required>
                    <option value="">Seleccionar una marca</option>
                    <?php
                    // Obtener marcas desde la base de datos
                    $sql = "SELECT * FROM marcas";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($marcas as $marca) {
                        echo "<option value='{$marca['id_marca']}'>{$marca['nombre_marca']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Auto</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
