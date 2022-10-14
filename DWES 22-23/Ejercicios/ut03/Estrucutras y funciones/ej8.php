<?php 
//Crea una función que genere un array asociativo que contenga información de los parámetros. 
//La función irá descubriendo los tipos


//le paso un array de parametros indefinidos ...$parametros es (3, "h", 'hola', [1,2,3], [1], "h");
function analizParametros(...$parametro){
    $array1=[];
    //este forech coge $parametro y va pasando de valor en valor guardando los tipos de varible
    //y en ellos el numero de veces que se repiten
    foreach ($parametro as $key => $value) {
        $array1[gettype($value)]+=1;
    }
    return $array1;
}

$analisis = analizParametros(3, "h", 'hola', [1,2,3], [1], "h");
print_r($analisis)
?>