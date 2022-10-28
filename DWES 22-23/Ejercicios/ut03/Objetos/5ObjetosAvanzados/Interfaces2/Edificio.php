<?php
class Edificio{
    use setdesc;
    use getdesc;
    use setpos;
    use getpos;

    private $altura;
    private $descripcion;
    private $posicion;

    public function setaltura($altura){
        $this->altura=$altura;
    }

    public function getaltura(){
        return $this->altura;
    }    
}
?>