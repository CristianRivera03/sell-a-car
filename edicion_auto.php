<?php
include('app/config.php');
include("layout/session.php");
include("app/controllers/edicion/edicion_auto.php"); // Controlador que obtiene los datos del auto y las marcas
include("layout/part_one.php");
 // Archivo de configuración con la conexión a la base de datos

// Obtén las marcas y el auto en base a `id_auto` (esto debería estar en edicion_auto.php)
// $auto contiene los datos del auto que se editará
// $marcas contiene las opciones de marcas disponibles
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style-home.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Auto</h1>

        <!-- Formulario para editar un auto -->
        <form action="app/controllers/actualizacion/actualizacion.php" method="POST" enctype="multipart/form-data">
            <!-- Campo oculto con el ID del auto -->
            <input type="hidden" name="id_auto" value="<?php echo $auto['id_auto']; ?>">

            <!-- Campo oculto con la imagen actual -->
            <input type="hidden" name="imagen_actual" value="<?php echo $auto['imagen']; ?>">

            <!-- Selección de marca -->
            <div class="mb-3">
                <label for="id_marca" class="form-label">Marca</label>
                <select class="form-select" name="id_marca" required>
                    <?php foreach ($marcas as $marca) { ?>
                        <option value="<?php echo $marca['id_marca']; ?>" 
                                <?php if ($marca['id_marca'] == $auto['id_marca']) echo 'selected'; ?>>
                            <?php echo $marca['nombre_marca']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <!-- Campo para modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" name="modelo" id="modelo" value="<?php echo $auto['modelo']; ?>" required>
            </div>

            <!-- Campo para año -->
            <div class="mb-3">
                <label for="year" class="form-label">Año</label>
                <input type="number" class="form-control" name="year" id="year" value="<?php echo $auto['year']; ?>" required>
            </div>

            <!-- Campo para precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" id="precio" value="<?php echo $auto['precio']; ?>" step="0.01" required>
            </div>

            <!-- Campo para descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" required><?php echo $auto['descripcion']; ?></textarea>
            </div>

            <!-- Campo para imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" accept="image/*">
            </div>

            <!-- Botón para enviar -->
            <button type="submit" class="btn btn-primary">Actualizar Auto</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
