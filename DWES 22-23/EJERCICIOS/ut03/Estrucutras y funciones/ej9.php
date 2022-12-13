<?php
//Crea una función que reciba dos variables cualesquiera e intercambie su valor. Las variables tendrán ese valor fuera de la función. 
//PRUEBA: Crea una web en la que se muestre cómo se comporta esta función con variables de distinto tipo.
$var1=23;
$var2="hola";

//El & hace que los valores que has pasado desde fuera y pasan por la funcion cambian de valor tambien fuera.
function cambioVar(&$var1,&$var2){
$aux=$var1;
$var1=$var2;
$var2=$aux;

echo ($var1 . " " .$var2 . "</bR>");
}

cambioVar($var1,$var2);
echo ($var1 . " " .$var2);
?>

