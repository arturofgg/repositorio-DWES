<?php
class CocheConRemolque extends Coche{
    private $capacidad_remolque;

    public function pintarInformacion(){
        return parent::pintarInformacion()." y remolque de ".$this->capacidad_remolque;
    }

    public function setCapacidad_remolque($capacidad_remolque){
        $this->capacidad_remolque=$capacidad_remolque;
    }

    public function getCapacidad_remolque(){
        return $this->capacidad_remolque;
    }   
}
?>