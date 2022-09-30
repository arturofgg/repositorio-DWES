<?php
/*Dados estos arrays consigue que el resultado sea rojo, verde, naranja, azul*/

$a1=array("a"=>"rojo");
$a2=array("b"=>"añil", "c"=>"violeta");
$a3=array("d"=>"verde""f"=>"naranja");
$a4=array("i"=>"azul");
$a5=array("g"=>"azul", "h"=>"blanco");


/*solucion:*/ print_r(array_merge($a1,$a3,$a4));

?>

<?php/*
8 Fausto, Sergio, Henry:
in_arrary, array_push, explode

Dado un texto o párrafo concreto:
Verificar si existe una palabra pasada por formulario en el texto o parrafo.
*/?>

<?/*
3 Xing , Marcos
Funciones: array_replace, array_walk_recursive.
Enunciado: Crear una array bidimesional que guarda nombre de usuario y contraseña de usuario
con array_walk_recursive ejecuta una funcion predefinida mostrando nombre de usuario y contraseña, despues con boton cambiar constraseña puede hace cambia de contraseña usando array_replace.*/

function EscribirArray($valor, $llave){
	echo "Your $llave is $valor<br>";
}
$array=["username"=>"paco12","password"=>"pacocontra"]
print_r(array_walk_recursive($array));


?>