<?php

include("../../config.php");
session_start();
if (isset($_SESSION["session_user"])) {
    session_destroy();
    header("location:" . $URL . "/login");
}
