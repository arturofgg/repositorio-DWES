<?php 
namespace EXAMEN\Ejercicio2;
spl_autoload_register(function ($class) {
    $classPath = "../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});

class ExamenFacil extends AExamen {

    const MIN = 5;
    const MAX = 10;

    public function obtenerNota(): int{
        $numero = mt_rand(self::MIN,self::MAX);
        return $numero;
    }
        
}

?>