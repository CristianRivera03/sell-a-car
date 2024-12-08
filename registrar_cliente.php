<?php
include('app/config.php');
include("layout/session.php");
include("layout/part_one.php")
    ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Registrar Cliente</h1>
        <p class="text-center">Agrega un nuevo cliente al sistema.</p>

        <?php if (isset($_GET['mensaje'])) { ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($_GET['mensaje']); ?>
            </div>
        <?php } elseif (isset($_GET['error'])) { ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php } ?>

        <!-- Formulario para registrar cliente -->
        <form action="app/controllers/clientes/clientes.php" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Cliente</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Opcional">
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <textarea class="form-control" name="direccion" id="direccion" placeholder="Opcional"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Cliente</button>
        </form>

        <a href="ventas.php" class="btn btn-link mt-3">Volver a Ventas</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>