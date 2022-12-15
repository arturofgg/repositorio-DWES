<?php 
include "menu.php";

$bcolor = $_COOKIE["bcolor"];
$fcolor = $_COOKIE["fcolor"];
$user = $_COOKIE["user"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: <?php echo $bcolor; ?>;
            color: <?php echo $fcolor; ?>;
        }
    </style>
</head>
<body>
    <div>
        <p>Esto no se hace así</p>
        <p>Se hace con sesiones</p>
    </div>
    <?php
        echo pintarMenu($user);
    ?>
</body>
</html>