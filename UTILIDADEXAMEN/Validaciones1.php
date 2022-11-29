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
        <input type="checkbox" id="checkbox1" name="checkbox[]" value="checkbox1"> <label for="checkbox1">checkbox1</label><br>
        <input type="checkbox" id="checkbox2" name="checkbox[]" value="checkbox2"> <label for="checkbox2">checkbox2</label><br>
        <input type="checkbox" id="checkbox3" name="checkbox[]" value="checkbox3"> <label for="checkbox3">checkbox3</label><br>
        <input type="checkbox" id="checkbox4" name="checkbox[]" value="checkbox4"> <label for="checkbox4">checkbox4</label><br><br>

        <input type="submit" id="submit" name="submit" value="enviar"> 
    </form>
</body>
</html>
<!--_______________________________________________________________________________________________________________________________________________________________-->

<?php

//VALIDACIONES
 //VALIDACIONES GENERALES

function validarGeneral(ExpReg $regex, string $campo) : bool{
    return isset($_POST[$campo]) && preg_match($regex->value, $_POST[$campo]);
}

//VALIDACIONES ESPECIFICAS

//VALIDAR NOMBRE
function validarNombre(string $campoNombre) : bool{
    return validarGeneral(ExpReg::NOMBRE, $campoNombre);
}

//VALIDAR EMAIL
function validarEmail(string $campoEmail) : bool{
    return validarGeneral(ExpReg::CORREO, $campoEmail);
}

//VALIDAR NUMERO
function validarNumero(string $campoNumero) : bool{
    return validarGeneral(ExpReg::NUMERO, $campoNumero);
}

//VALIDAR FECHA SI ES DESPUES DE HOY!
function validarFecha(string $campoFecha) : bool{
    return  (Fecha::fromYYYYMMDD($_POST[$campoFecha]))->despuesDeHoy();  
}

//VALIDAR RADIO
 function validarRadio(string $campoRadio) : bool {
    return ($_POST[$campoRadio] == "radio1" || $_POST[$campoRadio] == "radio2" ||$_POST[$campoRadio] == "radio3");
 }

//VALIDAR SELECT
function validarSelect(string $campoSelect) : bool{
    return ($_POST[$campoSelect] == "select1") || ($_POST[$campoSelect] == "select2") || ($_POST[$campoSelect] == "select3");    
}

//VALIDAR CHECKBOX
function validarCheckbox($campoCheckbox=[]) : bool{
    $arr_bool = [];

    for($i=0; $i<4; $i++){
        if(($_POST[$campoCheckbox[$i]]) == "checkbox" . $i+1){
            $arr_bool[$i] = "checkbox" . $i+1;
        }
    }

    for($i=0; $i<4; $i++){
        $cont=0;
        if(in_array(("checkbox" . $i+1),$arr_bool)){
            $cont++;
        }
    }

    if($cont==4){
        return (true);
    }else return (false);
}

if(validarCheckbox("checkbox[]")){
    $checkbox=$_POST["checkbox[]"];
    echo("bien");
}else echo("Hay alguna opcion del checkbox que no pertenece a las opciones<br>");


//VALIDACION FINAL
if (isset($_POST["submit"])){
/*
    if(validarNombre("nombre")){
        $nombre=$_POST["nombre"];
        echo("bien");
    }else echo("El nombre esta mal escrito<br>");

    if(validarEmail("email")){
        $email=$_POST["email"];
        echo("bien");
    }else echo("El email esta mal escrito<br>");
    
    if(validarNumero("numero")){
        $numero=$_POST["numero"];
        echo("bien");
    }else echo("El numero esta mal escrito<br>");

    if(validarFecha("fecha")){
        $fecha=$_POST["fecha"];
        echo("bien");
    }else echo("La fecha debe ser posterior a la actual<br>");

    if(validarRadio("radio")){
        $radio=$_POST["radio"];
        echo("bien");
    }else echo("Hay un radio que no pertenece a las opciones<br>");

    if(validarSelect("select")){
        $select=$_POST["select"];
        echo("bien");
    }else echo("Hay alguna opcion del select que no pertenece a las opciones<br>");

    
*/
}   

?>


