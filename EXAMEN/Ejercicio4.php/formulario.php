<?php 

namespace EXAMEN\Ejercicio4;
require ("ExpReg.php");

 //VALIDACIONES GENERALES

 function validarGeneral(ExpReg $regex, string $campo) : bool{
    return isset($_POST[$campo]) && preg_match($regex->value, $_POST[$campo]);
}

//VALIDACIONES ESPECIFICAS

//VALIDAR NOMBRE
function validarNombre(string $campoNombre) : bool{
    return validarGeneral(ExpReg::NOMBRE, $campoNombre);
}


if (isset($_POST["submit"])){

    if(validarNombre("nombrequeso")){
        $nombre=$_POST["nombrequeso"];
        echo("nombrequeso escrito correctamente<br>");
    }else echo("El nombre esta mal escrito<br>");

    if(validarNombre("direccion")){
        $direccion=$_POST["direccion"];
        echo("direccion escrita correctamente<br>");
    }else echo("La direccion esta mal escrita<br>");

    if($nombre==$_POST["nombrequeso"] && $direccion==$_POST["direccion"]){
        echo("Gracias por su pedido");
    }
}else echo("No se ha podido enviar");


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
    <form action="" method="post">

        <label>NOMBRE QUESO: </label><input type="text" id="nombrequeso" name="nombrequeso"><br><br>

        <label>DIRECCION ENVIO: </label><input type="text" id="direccion" name="direccion"><br><br>
        
        <label>EXTRAS CHECKBOX:</label><br>
        <input type="checkbox" id="checkbox1" name="checkbox[]" value="Caja Madera"> <label for="checkbox1">Caja Madera</label><br>
        <input type="checkbox" id="checkbox2" name="checkbox[]" value="Tarjeta Regalo"> <label for="checkbox2">Tarjeta Regalo</label><br>
        <input type="checkbox" id="checkbox3" name="checkbox[]" value="Envio Urgente"> <label for="checkbox3">Envio Urgente</label><br>
        <input type="checkbox" id="checkbox4" name="checkbox[]" value="Panecillos"> <label for="checkbox4">Panecillos</label><br>
        <input type="checkbox" id="checkbox5" name="checkbox[]" value="Membrillo"> <label for="checkbox5">Membrillo</label><br><br>

        <input type="submit" id="submit" name="submit" value="enviar">
    </form>
</body>
</html>