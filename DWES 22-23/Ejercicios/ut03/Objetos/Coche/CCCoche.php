<?php
require("Coche.php");
require("CocheConRemolque.php");
require("CocheGrua.php");
$arr = [];

$c1 = new Coche();
$c1->setMatricula(1000);
$c1->setMarca("BMV");
$c1->setCarga(30);

$ccr1 = new CocheConRemolque();
$ccr1->setMatricula(1001);
$ccr1->setMarca("Renault");
$ccr1->setCarga(30);
$ccr1->setCapacidad_remolque(200);

$c2 = new Coche();
$c2->setMatricula(1002);
$c2->setMarca("Porche");
$c2->setCarga(40);

$cg1 = new CocheGrua();
$cg1->setMatricula(1003);
$cg1->setMarca("Ford");
$cg1->setCarga(20);

$cg1->cargar($c2);

$ccr2 = new CocheConRemolque();
$ccr2->setMatricula(1005);
$ccr2->setMarca("Nissan");
$ccr2->setCarga(22);
$ccr2->setCapacidad_remolque(250);

$cg2 = new CocheGrua();
$cg2->setMatricula(1007);
$cg2->setMarca("Kia");
$cg2->setCarga(30);

$cg2->cargar($ccr2);
$cg1->descargar();

$arr2 = [$c1, $ccr1, $cg1, $cg2];

array_walk($arr2,function(Coche $valor){echo $valor->pintarInformacion(). "<br>";});
?>