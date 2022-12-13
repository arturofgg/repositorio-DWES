<?php 

namespace UTILIDADEXAMEN;

//AUTOLOAD
spl_autoload_register(function ($class) {
    $classPath = "../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});

?>
<!--____________________________________________________________________________________________________________________________________________________________________-->

<!--FORMULARIOS-->
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

        <label>NOMBRE: </label><input type="text" id="nombre" name="nombre"><br><br>
        
        <label>EMAIL: </label><input type="text" id="email" name="email"><br><br>
        
        <label>NUMERO: </label><input type="number" id="numero" name="numero"><br><br>
        
        <label>FECHA: </label><input type="date" id="fecha" name="fecha"><br><br>
        
        <label>RADIO:</label><br>
            <label>opcion1: </label><input type="radio" id="radio1" name="radio" value="radio1" checked><br>
            <label>opcion2: </label><input type="radio" id="radio2" name="radio" value="radio2"><br>
            <label>opcion3: </label><input type="radio" id="radio3" name="radio" value="radio3"><br><br>
       
        <label>SELECT:</label><br>
        <select name="select" id="select">
            <option value="select1" selected >select1</option><br>
            <option value="select2">select2</option><br>
            <option value="select3">select3</option><br>
        </select><br><br>

        <label>CHECKBOX:</label><br>
        <input type="checkbox" id="checkbox1" name="checkbox1" value="checkbox1"> <label for="checkbox1">checkbox1</label><br>
        <input type="checkbox" id="checkbox2" name="checkbox2" value="checkbox2"> <label for="checkbox2">checkbox2</label><br>
        <input type="checkbox" id="checkbox3" name="checkbox3" value="checkbox3"> <label for="checkbox3">checkbox3</label><br>
        <input type="checkbox" id="checkbox4" name="checkbox4" value="checkbox4"> <label for="checkbox4">checkbox4</label><br><br>

        <input type="submit" id="submit" name="submit" value="enviar"> 
    </form>
</body>
</html>
<!--_______________________________________________________________________________________________________________________________________________________________-->

<?php
$errores = [];
 
//VALIDACION GENERAL DE TODO
if (isset($_POST["submit"])){


    //VALIDAR NOMBRE CON ARRAY DE ERRORES
    if (isset($_POST["nombre"])){
        if (preg_match(ExpReg::NOMBRE->$value, $_POST["nombre"])){
            $nombre = $_POST["nombre"];
        }else $errores["nombre"] = "Escribe el nombre correctamente";
    }else $errores["nombre"] = "Debes escribir un nombre";


    //VALIDAR EMAIL CON ARRAY DE ERRORES
    if (isset($_POST["email"])){
        if (preg_match(ExpReg::CORREO->$value, $_POST["email"])){
            $email = $_POST["email"];
        }else $errores["email"] = "Escribe el email correctamente";
    }else $errores["email"] = "Debes escribir un email";


    //VALIDAR NUMERO CON ARRAY DE ERRORES
    if (isset($_POST["numero"])){
        if (preg_match(ExpReg::NUMERO->$value, $_POST["numero"])){
            $numero = $_POST["numero"];
        }else $errores["numero"] = "Escribe un numero correctamente";
    }else $errores["numero"] = "Debes escribir un numero";


    //VALIDAR FECHA SI ES DESPUES DE HOY! CON ARRAY DE ERRORES
    if (Fecha::fromYYYYMMDD($_POST["fecha"])->despuesDeHoy()){
        $fecha = $_POST["fecha"];
    }else $errores["fecha"] = "Escribe una fecha posterior a la actual";


    //VALIDAR RADIO CON ARRAY DE ERRORES


    //VALIDAR SELECT CON ARRAY DE ERRORES
    if (($_POST["select"] == "select1") || ($_POST["select"] == "select2") || ($_POST["select"] == "select3")){
        $select = $_POST["select"];
    }else $errores["select"] = "No esta dentro de las opciones del SELECT";


    //VALIDAR CHECKBOX CON ARRAY DE ERRORES

}

?>


