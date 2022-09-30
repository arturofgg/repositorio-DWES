<?php/*
3 Xing , Marcos
Funciones: array_replace, array_walk_recursive.
Enunciado: Crear una array bidimesional que guarda nombre de usuario y contraseña de usuario
con array_walk_recursive ejecuta una funcion predefinida mostrando nombre de usuario y contraseña, despues con boton cambiar constraseña puede hace cambia de contraseña usando array_replace.*/
?>

<?php 
function EscribirArray($valor, $llave){
	echo "Your $llave is $valor<br>";
}

$array=["username"=>"paco12","password"=>"pacocontra"];
array_walk_recursive($array, "EscribirArray");
?>

