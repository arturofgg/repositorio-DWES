<?php
//Crea la clase Circulo con el metodo setRadio y el metodo getRadio y getArea.
//Tendra una propiedad privada para almacenar el radio.
//Tendra una cosntante privada para almacenar PI 
//Necesitas definir el fichero Icon la clase por un lado y por otro pagina que lo usa
?>

<?php 
class Circulo{
    private $radio; 
    private const PI = M_PI;

    function setRadio($radio){
    $this->radio = $radio;
    }

    function getRadio(){
        return $this->radio;
    }

    function getArea(){
        $area=(self::PI*($this->radio * $this->radio));
        return $area;
    }

}