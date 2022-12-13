<?php
class Edificio{
    use descripcion;
    use posicion;

    private $altura;
    private $descripcion;

    public function setaltura($altura){
        $this->altura=$altura;
    }

    public function getaltura(){
        return $this->altura;
    }    
}
?>