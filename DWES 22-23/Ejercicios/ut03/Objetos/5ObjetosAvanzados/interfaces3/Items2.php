<?php
class Items{
    use descripcion;
    use posicion;

    private $peso;
    private $descripcion;

    public function setpeso($peso){
        $this->peso=$peso;
    }

    public function getpeso(){
        return $this->peso;
    }     
}
?>