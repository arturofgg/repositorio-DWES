<?php 
require ("Circulo.php");

$circulo1 = new Circulo();
$circulo2 = new Circulo();

$circulo1->setRadio(3);
echo ($circulo1->getRadio() . "<br>");
echo ($circulo1->getArea() . "<br><br>");

$circulo2->setRadio(2);
echo ($circulo2->getRadio() . "<br>");
echo ($circulo2->getArea() . "<br><br>");

?>