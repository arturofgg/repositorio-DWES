<?php
trait setnom{
    public function getnombre(){
        return $this->nombre;
    }
}
trait getnom{
    public function setnombre($nombre){
        $this->nombre=$nombre;
    }
}

trait atacar{
    
    public function atacar(){
        echo("El personaje ".$this->nombre." ha atacado!");
    }
}
trait defender{
    public function defender(){
        echo("El personaje ".$this->nombre." ha bloqueado el ataque!");    
    }
}

trait setdesc{
    public function setdescripcion($descripcion){
        $this->descripcion=$descripcion;
    }
}
trait getdesc{
    public function getdescripcion(){
        return $this->descripcion;
    }   
}

trait setpos{
    public function setposicion($posicion){
        $this->posicion=$posicion;
    }
}
trait getpos{
    public function getposicion(){
       return $this->posicion;
    }
}
?>