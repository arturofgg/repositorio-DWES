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
 /*function validarRadio(string $campoRadio) : bool{
    if (isset($_POST[$campoRadio])){
        
    }
}*/

//VALIDAR SELECT
function validarSelect(string $campoSelect) : bool{
    return ($_POST[$campoSelect] == "select1") || ($_POST[$campoSelect] == "select2") || ($_POST[$campoSelect] == "select3");    
}


//VALIDAR CHECKBOX


//VALIDACION FINAL
if (isset($_POST["submit"])){
    /*
    if(validarNombre("nombre") && validarEmail("email") && validarNumero($_POST["numero"]) && validarFecha($_POST["fecha"])  && validarRadio($_POST["radio"])  && validarSelect($_POST["select"])  &&  validarCheckbox($_POST["checkbox"])){
        echo("hola");
    }else var_dump($_POST);
    */
    
    if(validarSelect("select")){     
        echo "YES";
    }else echo ("Mierdas");
}





?>


