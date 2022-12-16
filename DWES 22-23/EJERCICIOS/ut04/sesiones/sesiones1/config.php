<?php 
/* 3 paginas con texto libre, texto campo con nombre (anonimo o nombre)
formulario con 3 cookies para config (cambiar el color de texto, del fondo y otra para el nombre)
Usar include para menu para navegar entre paginas
No validar XSS 
Separar logica de presentacion 
cambairlo por sesiones
adivinar el numero entre 0 y 10 con 3 intentos  
hacer un captcha*/

include "menu.php";
session_start();

if(isset($_POST["bcolor"])){
    $bcolor = $_POST["bcolor"];
    $_SESSION["bcolor"] =  $_POST["bcolor"];
}else if(isset($_SESSION["bcolor"]) && (!isset($_POST["bcolor"]))){
    $bcolor = $_SESSION["bcolor"];
}

if(isset($_POST["fcolor"])){
    $fcolor = $_POST["fcolor"];
    $_SESSION["fcolor"] =  $fcolor;
}else if(isset($_SESSION["fcolor"]) && (!isset($_POST["fcolor"]))){
    $fcolor = $_SESSION["fcolor"];
}

if(isset($_POST["user"])){
    $user = $_POST["user"];
    $_SESSION["user"] =  $user;
}else if (isset($_SESSION["user"]) && (!isset($_POST["user"]))){
    $user = $_SESSION["user"];
}else $user = "anonimo";

//$page;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
    <style>
        body{
            background-color: <?php echo $bcolor; ?>;
            color: <?php echo $fcolor; ?>;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label>Color del fondo: </label><input type="color" id="bcolor" name="bcolor" value="<?php echo $bcolor ?>" ><br><br>
        <label>Color del texto: </label><input type="color" id="fcolor" name="fcolor" value="<?php echo $fcolor ?>"><br><br>
        <label>Nombre del usuario: </label><input type="text" id="user" name="user" value="<?php echo $user ?>"><br>
        <input type="submit" id="submit" name="submit" value="Enviar"><br>
    </form><br>
    <?php
       echo pintarMenu($user);
    ?>
</body>
</html>