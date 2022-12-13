<?php 
require("CuentaBancaria.php");

$c1 = new CuentaBancaria("Paco",2500);
$c2 = new CuentaBancaria("Polla",100);
$c3 = new CuentaBancaria("Oskar",10000);
//echo $c1->mostrar();
//echo $c2->mostrar();

 //$c1->retirar(200);
 //$c2->ingresar(20);
//echo $c1->mostrar();
//echo $c2->mostrar();

//$c1->transferirA($c2,500);
//echo $c1->mostrar();
//echo $c2->mostrar();

//$c3->bancaRota();
//echo $c3->mostrar();

$c1->unirCon($c2);
echo $c1->mostrar();
echo $c2->mostrar();
?>