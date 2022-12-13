<?php
namespace EXAMEN\Ejercicio2;

//AUTOLOAD
spl_autoload_register(function ($class) {
    $classPath = "../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});

$EF1 = new ExamenFacil();
$EC1 = new ExamenChungo();
$EH1 = new ExamenHP();
echo ($EF1->obtenerNota() . "<br>");
echo ($EC1->obtenerNota(). "<br>");
echo ($EH1->obtenerNota(). "<br>");
?>
