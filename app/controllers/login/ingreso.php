<?php

include("../../config.php");

$user = $_POST["user"];
$password_user = $_POST["password"];

$contador = 0;
$sql = "SELECT * from tbl_users WHERE user = '$user' AND password = '$password_user';";
$query = $pdo->prepare($sql);
$query->execute();

$usuarios = $query->fetchAll(pdo::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $email_tbl = $usuario["email"];
    $nombres = $usuario["nombre"];
}

if ($contador == 0) {
    session_start();
    $_SESSION["mensaje"] = "Error datos incorrectos";
    header("location:" . $URL . "/login/index.php");

} else {
    echo "datos correctos";
    session_start();
    $_SESSION["session_user"] = $user;
    header("Location:" . $URL . "/index.php");

}