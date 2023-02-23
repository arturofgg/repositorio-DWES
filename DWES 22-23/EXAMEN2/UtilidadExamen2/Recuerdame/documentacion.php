<?php

session_start();


if(!isset($_SESSION["user"])){
    $_SESSION["documentacion"] = $_SERVER["REQUEST_URI"];
    header("Location: login.php?permiso=No&seccion=documentacion");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentacion</title>
    <style>
        body{
            background-color: cornsilk;
        }
        .contenedor{
            width: 50vw;
            height: 70vh;
            margin: 0 auto;
            background-color: white;
        }
        h1{
            padding-top: 3vh;
            text-align: center;
        }
        .foto{
            width: 50vw;
            height: 50vh;
            margin: 0 auto;
        }
        .foto{
           margin-left: 20vw;
           margin-top: 5vh;
        }
        .boton{
            width: 20vw;
            margin: 0 auto;
        }
        button{
            margin-left: 8.5vw;
            border: 1px solid blue;
            background-color: blue;
            border-radius: 3px;
            height: 3.5vh;
        }
        a{
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>
            Esta es la página de la documentación
        </h1>
        <div class="foto">
            <img src="./img/tick.png">
        </div>
        <div class="boton">
            <button><a href="index.php">Volver al inicio</a></button>
        </div>
    </div>
</body>
</html>