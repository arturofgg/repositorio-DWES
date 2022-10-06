<?php
/*
3 Xing , Marcos
Utiliza la función print_r() para ver la evolución de cada array.
Funciones: array_walk, array_map, array_replace
Extra: https://www.php.net/manual/es/function.password-hash.php

$usuarios = [
	"jorge" => "1234",
	"amparo" => "admin",
	"mary" = > "",
]

1 Enunciado: Crea una array bidimesional que guarda nombre de usuario y contraseña de usuario en texto claro. array_walk ejecuta una funcion predefinida mostrando nombre de usuario y contraseña
2 Enunciado: Utilizando las funciones de contraseñas y la función array_map. Genera un array nuevo con los usuarios y su contraseña en formato hash.
3 Enunciado: En base al ejercicio anterior cambia la función para que los usuarios sin contraseña tenga la contraseña "tmp2022"
4 Enunciado: Haz un filtrado de usuarios sin contraseña, utiliza array_replace para establecer en el array original $usuarios la contraseña de los usuarios que no tenían.
*/
?>

<?php 

//1
function EscribirArray($valor, $llave){
	echo ("Username: $llave <br> Password: $valor <br><br>");
}
$usuarios = [
	"jorge" => "1234",
	"amparo" => "admin",
	"mary" => ""
];
array_walk_recursive($usuarios, "EscribirArray");

//2

function hashconverter($valor){
	$contra=password_hash($valor, PASSWORD_DEFAULT);
	return ($contra);
}
$usuarios2=array_map("hashconverter", $usuarios);
array_walk_recursive($usuarios2, "EscribirArray");

//3
function passasing ($valor){
	if($valor==""){
		$valor="temp2022";
	}
	return($valor);
}
$usuarios3=array_map("passasing", $usuarios);
array_walk_recursive($usuarios3, "EscribirArray");

//4
function filtro ($arr){
	if($arr[1]==""){
		return($arr[0] .", ". $arr[1]);
	}
}
$filtro = array_filter($usuarios,"filtro");
array_walk_recursive($filtro, "EscribirArray");

$usuarios=array_replace($usuarios,$usuarios3);
array_walk_recursive($usuarios, "EscribirArray");
?>