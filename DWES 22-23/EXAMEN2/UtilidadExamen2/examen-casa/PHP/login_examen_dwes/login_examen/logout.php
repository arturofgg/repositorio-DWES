<?php

require('AccesoDatos.php');

session_start();

if(isset($_SESSION["user"])){

    unset($_SESSION["user"]);
    unset($_SESSION['id']);
}

session_unset();
session_destroy();


header("Location: index.php");

?>