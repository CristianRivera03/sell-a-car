<?php
include('app/config.php');
include("layout/session.php");
include("app/controllers/vender/vender.php");
include("layout/part_one.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Ventas</h1>

        <!-- Formulario para registrar una venta -->
        <h3>Registrar Venta</h3>
        <form action="app/controllers/vender/registrar_venta.php" method="POST">
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select class="form-select" name="id_cliente" id="id_cliente" required>
                    <option value="" selected disabled>Selecciona un cliente</option>
                    <?php foreach ($clientes as $cliente) { ?>
                        <option value="<?php echo $cliente['id_cliente']; ?>">
                            <?php echo $cliente['nombre']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_auto" class="form-label">Auto</label>
                <select class="form-select" name="id_auto" id="id_auto" required>
                    <option value="" selected disabled>Selecciona un auto</option>
                    <?php foreach ($autos as $auto) { ?>
                        <option value="<?php echo $auto['id_auto']; ?>">
                            <?php echo $auto['modelo'] . ' (' . $auto['year'] . ')'; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="precio_venta" class="form-label">Precio de Venta</label>
                <input type="number" class="form-control" name="precio_venta" id="precio_venta" step="0.01" required>
            </div>
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Bienvenido al sistema <?php echo $nombre_session ?> ",
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
            <button type="submit" class="btn btn-primary">Registrar Venta</button>
        </form>

        <!-- Tabla de autos vendidos -->
        <h3 class="mt-5">Autos Vendidos</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Auto</th>
                    <th>Año</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta) { ?>
                    <tr>
                        <td><?php echo $venta['id_venta']; ?></td>
                        <td><?php echo $venta['fecha_venta']; ?></td>
                        <td><?php echo $venta['nombre_cliente']; ?></td>
                        <td><?php echo $venta['modelo']; ?></td>
                        <td><?php echo $venta['year']; ?></td>
                        <td><?php echo $venta['precio_venta']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>