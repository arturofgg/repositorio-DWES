<?php
namespace EXAMEN\Ejercicio2;
spl_autoload_register(function ($class) {
    $classPath = "../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});

interface IExamen{
    public function intentar(string $nombre);
    public function obtenerNota() : int;
}
?>