<?php 
require("CuentaBancaria.php");

$c1 = new CuentaBancaria("Paco",2500);
$c2 = new CuentaBancaria("Polla",0);

echo $c1->mostrar();
echo $c2->mostrar();

echo $c1->retirar(200);
echo $c2->ingresar(20);
echo $c1->mostrar();
echo $c2->mostrar();

$c1->transferirA($c2,500);
echo $c1->mostrar();
echo $c2->mostrar();
?>