<?php
define("SERVIDOR", "localhost");
define("USUARIO", "root");
define("PASSWORD", "");
define("DB", "rentaacar");

$servidor = "mysql:dbname=" . DB . ";host=" . SERVIDOR;

try {
    $pdo = new PDO(
        $servidor,
        USUARIO,
        PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    // echo "La conexión fue un éxito";
} catch (PDOException $e) {
    print ("Error mi causa: " . $e->getMessage());
}


$URL = "http://localhost/rentacar.com";