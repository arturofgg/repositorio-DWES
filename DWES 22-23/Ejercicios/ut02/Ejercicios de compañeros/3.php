<?php/*
3 Xing , Marcos
Utiliza la función print_r() para ver la evolución de cada array.
Funciones: array_walk, array_map, array_replace
Extra: https://www.php.net/manual/es/function.password-hash.php
$usuarios = [
	"jorge" => "1234",
	"amparo" => "admin",
	"mary" = > "",
]
Enunciado: Crea una array bidimesional que guarda nombre de usuario y contraseña de usuario en texto claro. array_walk ejecuta una funcion predefinida mostrando nombre de usuario y contraseña
Enunciado: Utilizando las funciones de contraseñas y la función array_map. Genera un array nuevo con los usuarios y su contraseña en formato hash.
Enunciado: En base al ejercicio anterior cambia la función para que los usuarios sin contraseña tenga la contraseña "tmp2022"
Enunciado: Haz un filtrado de usuarios sin contraseña, utiliza array_replace para establecer en el array original $usuariosla contraseña de los usuarios que no tenían.*/
?>

<?php 
function EscribirArray($valor, $llave){
	echo "Your $llave is $valor<br>";
}

$array=["username"=>"paco12","password"=>"pacocontra"];
array_walk_recursive($array, "EscribirArray");
?>

