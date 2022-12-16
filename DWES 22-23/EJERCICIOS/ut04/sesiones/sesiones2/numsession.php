<?php

session_start();

//VARIABLES
$intentos;
$numIntentos = 4;
$numero;
$aleatorio;


//INTENTOS
$intentos = isset($_SESSION["intento"]) ? $_SESSION["intento"] : $numIntentos;
$intentos--;
$_SESSION["intento"] = $intentos;

//NUMERO DEL FORMULARIO
if(isset($_POST["numero"])){
    $numero = $_POST["numero"];
}

//NUMERO ALEATORIO
$aleatorio= isset($_SESSION["aleatorio"]) ? $_SESSION["aleatorio"] : rand(0, 10);
$_SESSION["aleatorio"] = $aleatorio;
echo($aleatorio);

function comparar($numero, $aleatorio){
    if($numero == $aleatorio){
        echo "ESE ES EL NUMERO! <br>";
    }else if($numero < $aleatorio){
        echo "EL NUMERO ES MENOR <br>";
    }else if($numero > $aleatorio){
        echo "EL NUMERO ES MAYOR <br>";
    }
}

//RESET
if ($intentos<1){
    session_destroy();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>numesseion</title>
</head>
<body>
    <form method="POST" action="">
        <label>Escribe un numero del 0 al 9: </label><input type="numero" id="numero" name="numero"><br><br>
        <input type="submit" id="submit" name="submit" value="Enviar"><br>
    </form>
    <div>
        <p>Tu numero de intentos es <?= $intentos ?></p>
        <p><?php 
        if (isset($_POST["numero"])){
            comparar($numero,$aleatorio);
        } ?></p>
    </div>
</body>
</html>