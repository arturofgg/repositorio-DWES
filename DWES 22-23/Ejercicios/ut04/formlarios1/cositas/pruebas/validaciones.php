<?php
/*
use Fecha;
use Genero;


//CINE

//expresiones regulares
$expNombre = "[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?)*";
$expLugar = "[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)*";


//nombre :)
if(empty($_POST["nombre"])){
    $errores["nombre"] = 'Escribe un nombre';
}else {
    if(preg_match($expNombre, $_POST['nombre'])){
        $nombre = $_POST["nombre"];
    }else $errores["nombre"] = 'Solo se permiten letras, espacios y guiones';
}


//fecha
$hola=posteriorA($POST["fecha"]);
    if($hola==false){
        
    }


//lugar :)
if(empty($_POST["lugar"])){
    $errores["lugar"] = 'Escribe una calle';
}else {
    if(preg_match($expLugar, $_POST['lugar'])){
        $lugar = $_POST["lugar"];
    }else $errores["lugar"] = 'Escribe la calle correctamente';
}


//tarifa :)
if(empty($_POST["tarifa"]) || !is_int($_POST["tarifa"])){
    $errores["tarifa"] = 'Escribe una tarifa';
}else {
    if($_POST["tarifa"]>=0 && $_POST["tarifa"]<=20){
        $tarifa = $_POST["tarifa"];
    }else $errores["tarifa"] = 'Tarifa maxima = 20€';
}


//aforo :)
if(empty($_POST["aforo"]) || !is_int($_POST["aforo"])){
    $errores["aforo"] = 'Escribe un aforo';
}else {
    if($_POST["aforo"]>=0 && $_POST["aforo"]<=150){
        $aforo = $_POST["aforo"];
    }else $errores["aforo"] = 'Aforo maximo = 150 personas';
}


//nombrepelicula :)
if(isset($_POST["nombrepelicula"]) && !empty($_POST["nombrepelicula"])){
    $nombrepelicula = $_POST["nombrepelicula"];
}else {
    $errores["nombrepelicula"] = 'Escribe el nombre de la película';
}


//duracion
if(empty($_POST["duracion"]) || !is_int($_POST["duracion"])){
    $errores["duracion"] = 'Escribe la duración de la película';
}else {
    if($_POST["duracion"]>0){
        $duracion = $_POST["duracion"];
    }else $errores["duracion"] = 'La duración no puede ser negativa';
}


//genero
$correcto=true;
$cont=0;
if(!empty($_POST["genero[]"])){
    for($i=0; $i<count($_POST["genero[]"]) && $correcto; $i++){
        if(Genero::fromValue($_POST["genero[".$i."]"]) == Genero::NONE){
            $errores["genero"] = "Genero no valido";
            $correcto=false;
        }else $genero[$cont++] = $_POST["genero[".$i."]"];  
    }  
}else $errores["genero[]"] = "No ha introducido ningun genero";

//CONCIERTO

//nombre :)
if(empty($_POST["nombre"])){
    $errores["nombre"] = 'Escribe un nombre';
}else {
    if(preg_match($expNombre, $_POST['nombre'])){
        $nombre = $_POST["nombre"];
    }else $errores["nombre"] = 'Solo se permiten letras, espacios y guiones';
}


//fecha
$fechatoDate = Fecha::fromDDMMYYYY($_POST["fecha"]);
if($fechatoDate->despuesDeHoy()==false || empty($_POST["fecha"])){
    $errores["fecha"] = "Escribe una fecha valida";
}else $fecha = $_POST["fecha"];


//lugar :)
if(empty($_POST["lugar"])){
    $errores["lugar"] = 'Escribe una calle';
}else {
    if(preg_match($expLugar, $_POST['lugar'])){
        $lugar = $_POST["lugar"];
    }else $errores["lugar"] = 'Escribe la calle correctamente';
}


//tarifa :)
if(empty($_POST["tarifa"]) || !is_int($_POST["tarifa"])){
    $errores["tarifa"] = 'Escribe una tarifa';
}else {
    if($_POST["tarifa"]>=0 && $_POST["tarifa"]<=120){
        $tarifa = $_POST["tarifa"];
    }else $errores["tarifa"] = 'Tarifa maxima = 120€';
}


//aforo :)
if(empty($_POST["aforo"]) || !is_int($_POST["aforo"])){
    $errores["aforo"] = 'Escribe un aforo';
}else {
    if($_POST["aforo"]>=0 && $_POST["aforo"]<=500){
        $aforo = $_POST["aforo"];
    }else $errores["aforo"] = 'Aforo maximo = 500 personas';
}


//nombregrupo :)
if(isset($_POST["nombregrupo"]) && !empty($_POST["nombregrupo"])){
    $nombregrupo = $_POST["nombregrupo"];
}else {
    $errores["nombregrupo"] = 'Escribe el nombre de el grupo';
}


//duracion
if(empty($_POST["duracion"]) || !is_int($_POST["duracion"])){
    $errores["duracion"] = 'Escribe la duración de la película';
}else {
    if($_POST["duracion"]>0){
        $duracion = $_POST["duracion"];
    }else $errores["duracion"] = 'La duración no puede ser negativa';
}


//genero
*/
?>