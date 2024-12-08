<?php
include('app/config.php'); // Asegúrate de incluir el archivo config.php que contiene la conexión
include('layout/session.php'); // Si es necesario incluir la sesión, hazlo aquí
include('layout/part_one.php');
// Consulta para obtener los autos
$sql_autos = "SELECT autos.*, marcas.nombre_marca 
             FROM autos 
             INNER JOIN marcas ON autos.id_marca = marcas.id_marca";
$stmt_autos = $pdo->prepare($sql_autos); // Usa $pdo, no $conn
$stmt_autos->execute();
$autos = $stmt_autos->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener las marcas
$sql_marcas = "SELECT * FROM marcas";
$stmt_marcas = $pdo->prepare($sql_marcas); // Usa $pdo
$stmt_marcas->execute();
$marcas = $stmt_marcas->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Autos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style-home.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Autos</h1>
        <div class="mb-4">
            <h3>Agregar Nueva Marca</h3>
            <form action="app/controllers/gestion/agregar_marca.php" method="POST">
                <div class="mb-3">
                    <label for="nombre_marca" class="form-label">Nombre de Marca</label>
                    <input type="text" class="form-control" name="nombre_marca" id="nombre_marca" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Marca</button>
            </form>
        </div>

        <h3>Autos en Inventario</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($autos as $auto) { ?>
                    <tr>
                        <td><?php echo $auto['id_auto']; ?></td>
                        <td><?php echo $auto['nombre_marca']; ?></td>
                        <td><?php echo $auto['modelo']; ?></td>
                        <td><?php echo $auto['year']; ?></td>
                        <td><?php echo $auto['precio']; ?></td>
                        <td><?php echo $auto['descripcion']; ?></td>
                        <td><img src="uploads/<?php echo $auto['imagen']; ?>" alt="Imagen Auto" width="100"></td>
                        <td>
                            <a href="edicion_auto.php?id_auto=<?php echo $auto['id_auto']; ?>"
                                class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>