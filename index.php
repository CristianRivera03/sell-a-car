<?php
include('app/config.php');
include("layout/session.php");
include("layout/part_one.php");
?>

<script>
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Bienvenido al sistema <?php echo $nombre_session ?> ",
        showConfirmButton: false,
        timer: 2000
    });
</script>
        <!-- Contenido principal -->
        <div class="container mt-5">
            <h1 class="text-center mb-4">Listado de Autos</h1>
            <div class="row">
                <?php
                // Obtener datos de los autos
                $sql = "SELECT autos.*, marcas.nombre_marca FROM autos 
                        INNER JOIN marcas ON autos.id_marca = marcas.id_marca";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $autos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($autos)) {
                    foreach ($autos as $auto) {
                        ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="<?php echo $auto['imagen']; ?>" class="card-img-top" alt="Imagen del auto"
                                    style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $auto['modelo']; ?> (<?php echo $auto['year']; ?>)</h5>
                                    <p class="card-text">
                                        Marca: <?php echo $auto['nombre_marca']; ?><br>
                                        Precio: $<?php echo number_format($auto['precio'], 2); ?>
                                    </p>
                                    <p class="card-text"><?php echo $auto['descripcion']; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<div class="text-center">No hay autos disponibles en el inventario.</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>