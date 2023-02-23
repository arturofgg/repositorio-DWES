<?php

require('AccesoDatos.php');

session_start();

if(isset($_SESSION["user"])){

    unset($_SESSION["user"]);
    unset($_SESSION['id']);

    if (isset($_COOKIE['recuerdame'])) {
        $con = AccesoDatos::getSingletone();

        $con->borrarToken($_COOKIE["recuerdame"]);

        setcookie("recuerdame", null, [
            "expires" => time() - 3600,
            // "secure" => true,
            "httponly" => true
        ]);
    }
}

session_unset();
session_destroy();


header("Location: index.php");

?>