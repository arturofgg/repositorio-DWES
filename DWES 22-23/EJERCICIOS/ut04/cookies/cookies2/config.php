<?php 
/* 3 paginas con texto libre, texto campo con nombre (anonimo o nombre)
formulario con 3 cookies para config (cambiar el color de texto, del fondo y otra para el nombre)
Usar include para menu para navegar entre paginas
No validar XSS 
Separar logica de presentacion */

include "menu.php";

if(isset($_POST["bcolor"])){
    setcookie("bcolor",$_POST["bcolor"]);
    $bcolor = $_POST["bcolor"];
}else if(isset($_COOKIE["bcolor"]) && (!isset($_POST["bcolor"]))){
    $bcolor = $_COOKIE["bcolor"];
}

if(isset($_POST["fcolor"])){
    setcookie("fcolor",$_POST["fcolor"]);
    $fcolor = $_POST["fcolor"];
}else {
    $fcolor = $_COOKIE["fcolor"];
}

if(isset($_POST["user"])){
    setcookie("user",$_POST["user"]);
    $user = $_POST["user"];
}else if (isset($_COOKIE["user"]) && (!isset($_POST["user"]))){
    $user = $_COOKIE["user"];
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

