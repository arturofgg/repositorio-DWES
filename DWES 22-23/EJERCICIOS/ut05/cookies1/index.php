<?php 
    if(isset($_GET["aceptar"])){
        $verificado = setcookie("verificado","verificado");
    }else if(isset($_GET["rechazar"])){
        $verificado = setcookie("verificado",null);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>BIENVENIDO A LA PAGINA</h1>
    <form action="" method="get">
        <input type="submit" id="aceptar" name="aceptar" value="aceptar">
        <input type="submit" id="rechazar" name="rechazar" value="rechazar">
    </form><br>
    <?php 
        if(isset($_GET["aceptar"])){ 
            echo("cookies aceptadas");
        }else if (isset($_GET["rechazar"]))echo("debes aceptar las cookies");
    ?><br>
    <a href="configurado.php">Reenviar</a><br>
</body>
</html>

