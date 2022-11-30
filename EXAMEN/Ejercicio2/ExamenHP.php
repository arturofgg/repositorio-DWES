<?php 
namespace EXAMEN\Ejercicio2;
spl_autoload_register(function ($class) {
    $classPath = "../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});

class ExamenHP extends AExamen {

    const MIN = 4;
    const MAX = 4.5;

    public function obtenerNota(): int{
        $numero = mt_rand(self::MIN,self::MAX);
        return $numero;
    }
    
}

?>