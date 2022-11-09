<?php
use Fecha;

//CINE

//expresiones regulares
$expNombre = "[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?)*";
$expLugar = "[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)*";


//nombre :)
if(empty($_POST["nombre"])){
    $errores["nombre"] = 'Escribe un nombre';
}else {
    if(preg_match($expLugar, $_POST['nombre'])){
        $lugar = $_POST["nombre"];
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
if(empty($_POST["tarifa"]) || is_int($_POST["tarifa"]==false)){
    $errores["tarifa"] = 'Escribe una tarifa';
}else {
    if($_POST["tarifa"]>=0 && $_POST["tarifa"]<=20){
        $lugar = $_POST["lugar"];
    }else $errores["lugar"] = 'Tarifa maxima = 20€';
}


//aforo :)
if(empty($_POST["aforo"]) || is_int($_POST["aforo"]==false)){
    $errores["aforo"] = 'Escribe un aforo';
}else {
    if($_POST["aforo"]>=0 && $_POST["aforo"]<=150){
        $lugar = $_POST["aforo"];
    }else $errores["aforo"] = 'Aforo maximo = 150 personas';
}


//nombrepelicula :)
if(isset($_POST["nombrepelicula"]) && $_POST["nombrepelicula"]!=""){
    $nombre = $_POST["nombrepelicula"];
}else {
    $errores["nombrepelicula"] = 'Escribe el nombre de la película';
}


//duracion
if(empty($_POST["duracion"]) || is_int($_POST["duracion"]==false)){
    $errores["duracion"] = 'Escribe la duración de la película';
}else {
    if($_POST["duracion"]>=0){
        $lugar = $_POST["aforo"];
    }else $errores["aforo"] = 'La duración no puede ser negativa';
}


//genero


//CONCIERTO

//nombre :)
if(empty($_POST["nombre"])){
    $errores["nombre"] = 'Escribe un nombre';
}else {
    if(preg_match($expLugar, $_POST['nombre'])){
        $lugar = $_POST["nombre"];
    }else $errores["nombre"] = 'Solo se permiten letras, espacios y guiones';
}


//fecha
    if($POST["fecha"])


//lugar :)
if(empty($_POST["lugar"])){
    $errores["lugar"] = 'Escribe una calle';
}else {
    if(preg_match($expLugar, $_POST['lugar'])){
        $lugar = $_POST["lugar"];
    }else $errores["lugar"] = 'Escribe la calle correctamente';
}


//tarifa :)
if(empty($_POST["tarifa"]) || is_int($_POST["tarifa"]==false)){
    $errores["tarifa"] = 'Escribe una tarifa';
}else {
    if($_POST["tarifa"]>=0 && $_POST["tarifa"]<=20){
        $lugar = $_POST["lugar"];
    }else $errores["lugar"] = 'Tarifa maxima = 20€';
}


//aforo :)
if(empty($_POST["aforo"]) || is_int($_POST["aforo"]==false)){
    $errores["aforo"] = 'Escribe un aforo';
}else {
    if($_POST["aforo"]>=0 && $_POST["aforo"]<=150){
        $lugar = $_POST["aforo"];
    }else $errores["aforo"] = 'Aforo maximo = 150 personas';
}


//nombrepelicula :)
if(isset($_POST["nombrepelicula"]) && $_POST["nombrepelicula"]!=""){
    $nombre = $_POST["nombrepelicula"];
}else {
    $errores["nombrepelicula"] = 'Escribe el nombre de la película';
}


//duracion
if(empty($_POST["duracion"]) || is_int($_POST["duracion"]==false)){
    $errores["duracion"] = 'Escribe la duración de la película';
}else {
    if($_POST["duracion"]>=0){
        $lugar = $_POST["aforo"];
    }else $errores["aforo"] = 'La duración no puede ser negativa';
}


//genero
?>