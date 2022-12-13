<?php 
/*Singleton

Crea un objeto Config que implemente el patrón Singleton

Este objeto config puede almacenar la información del nombre de la aplicación.

    getNombre, setNombre

Crea una página en la que accedas desde distintos puntos a ese objeto Singleton

NOTA: Debes observar cómo es el mismo objeto.*/ 

class Config{

    public $nombre;
    private static $instancia;
    
    public static function singleton(){
        if(!isset(self::$instancia)){
            self::$instancia = new Config();
        }
        return self::$instancia;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    private function __construct() {}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>singleton</title>
</head>
<body>
    <?php

    $n2 = Config::singleton();
    $n3 = Config::singleton();

    $n2->setNombre("manole");
    $n3->setNombre("pollene <bR>");

    echo $n2->getNombre();
    echo $n3->getNombre();
    
    ?>
</body>
</html>