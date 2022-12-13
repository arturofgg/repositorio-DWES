<?php
class Items{
    use setdesc;
    use getdesc;
    use setpos;
    use getpos;

    private $peso;
    private $descripcion;
    private $posicion;

    public function setpeso($peso){
        $this->peso=$peso;
    }

    public function getpeso(){
        return $this->peso;
    }     
}
?>