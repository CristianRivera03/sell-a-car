<?php
session_start();
if (isset($_SESSION["session_user"])) {
    // echo "si existe sesion de " . $_SESSION["session_email"];

    $session_user = $_SESSION["session_user"];
    $sql = "SELECT * FROM tbl_users WHERE user = '$session_user'";

    $query = $pdo->prepare($sql);
    $query->execute();

    $usuarios = $query->fetchAll(pdo::FETCH_ASSOC);

    foreach ($usuarios as $usuario) {
        $nombre_session = $usuario["nombre"];
    }
} else {
    echo "no existe la session";
    header("Location:" . $URL . "/login/index.php");
}