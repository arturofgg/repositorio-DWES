<?php 
//Crea una función que reciba un array con información de un usuario 
//y escriba un formulario relleno. En este caso solo utiliza campos de texto o enteros
//NOTA: Utiliza las funciones array_map o array_walk

//<form id="datos personales" action="post">
//<input name="nombre" value="Jorge Dueñas Lerín"></input>
//... etc.
//</form>

$yo = [
    "nombre" => "Jorge Dueñas Lerín",
    "dirección" => "Calle falsa número 1234",
    "teléfono" => "91 123 45 67",
    "población" => "Madrid",
    "edad" => 23
];

