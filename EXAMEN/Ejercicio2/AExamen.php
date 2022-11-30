<?php
namespace EXAMEN\Ejercicio2;
spl_autoload_register(function ($class) {
    $classPath = "../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});

abstract class AExamen implements IExamen {

    use TieneFecha;
    private $nombre;

    public function setnombre($nombre){
        $this->nombre=$nombre;
    }

    public function getnombre(){
        return $this->nombre;
    }  

    public function intentar($parametroNombre){
         $this->nombre = $parametroNombre;
    }
}


?>