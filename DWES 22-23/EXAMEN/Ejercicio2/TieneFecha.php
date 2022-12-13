<?php
namespace EXAMEN\Ejercicio2;
spl_autoload_register(function ($class) {
    $classPath = "../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});

trait TieneFecha{
    private $fecha;
    
    public function setfecha($fecha){
        $this->fecha=$fecha;
    }

    public function getfecha(){
        return $this->nomfechabre;
    }  
}

?>