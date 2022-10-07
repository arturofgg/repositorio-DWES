<?php
/*
Crea un array con 20 números aleatorios. A continuación, ordénalo, quítale la primera mitad de los números y pónselos al final. Muestra todos los pasos por pantalla.

Tienes que usar las siguientes funciones

array_slice — Extract a slice of the array
array_push — Push one or more elements onto the end of array
sort — Sorts array in place by values in ascending order.4
rand — Generate a random integer
*/
?>
<?php
for($i=0;$i<20;$i++){
$array1[$i] = rand(1,9);
}
print_r($array1);
?>

<br><br>

<?php
sort($array1);
print_r($array1);
?>

<br><br>

<?php
$array2=array_slice($array1,0,10,true);
for($i=0;$i<count($array2);$i++){
array_push($array1,$array2[$i]);
}
$array1=array_slice($array1,10,count($array1),true);
print_r($array1);
?>