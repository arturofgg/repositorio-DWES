<?php

    //acceso a BD, sesión, etc. (tiene que ir en TODAS)
    require("./init.php");


    //seleccionamos toda la info de todos los usuarios


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <style>
        img{
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <?php include("menu.php"); ?>
    <!-- pintamos todos los users -->
    <?php if (isset($_SESSION["nombre"])) { ?>
        <h1>Has iniciado sesion <?= $_SESSION['nombre'] ?></h1>
    <?php } else {?>
        <h1>Este es el index de la pagina</h1>
    <?php } ?>

</body>
</html>