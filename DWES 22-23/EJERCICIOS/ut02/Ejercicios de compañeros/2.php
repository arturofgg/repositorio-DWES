<?php

/*
2 Funciones:  array_intersect, array_search y array_replace.
Enunciado: Designa dos arrays con varios números. Algunos de ellos deberán coincidir entre ambas arrays. A continuación:
    Crea un tercer array que contenga los números en común de los primeros dos. Habrá posiciones nulas.
    Crea un cuarto array con las posiciones que le falten al anterior y un número asignado a cada una, y júntalo con el anterior.
    Buca el índice de un valor en el array final (por ejemplo el del valor 13)
    Finalmente, imprime todos los arrays que has generado para ver los cambios. */




    /*primer array con valores comunes*/
$arr1=[1,3,20,22,26,5,7,9,11,15];
$arr2=[3,4,5,6,7,8,9,10,11,12,13,14,15,1];
$arr3=array_intersect($arr1,$arr2);
print_r($arr3);

/*array que meter en arr3*/
$arr4=[2 => 6, 3=>8, 4 =>0];

$arr5=array_replace($arr3,$arr4);

print_r($arr5);


print_r(array_search(11,$arr5));
/*plot twist*/
?>