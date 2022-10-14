<?php 
//Crea una función que genera un array aleatorio con parámetros variables 
//Por defecto generará 10 valores entre 0 y 10 Puedes especificar el número de valores como primer parámetro, 
//Puedes especificar el valor máximo como segundo parámetro o Puedes especificar número de valores, máximo y mínimo
//aleatorio();  [n,n,n,n,n,n,n,n,n,n]
//aleatorio(5) // [n,n,n,n,n]
//aleatorio(5,50)
//aleatorio(5,50,-50)

function genArray($vDefecto=5,$max=10, $min=-10){
    $vDefecto;
    $max;
    $min;
    $arr1=[];
    for($i=0;$i<$vDefecto;$i++){
        $arr1[$i]=mt_rand($min,$max);
    }
    return $arr1;
}
//puedes poner en la funcion valores por defecto y luego al llamar a la funcion darle otros.
print_r(genArray(3));

?>