<?php 
abstract class Mago implements videojuegoF {
    use posicion;
    public function defender(){
        echo("bloqueo majete");    
    }
    abstract public function atacar();
}

class MagoBlanco extends Mago{
    
    public function atacar(){
        echo("ataque feerico");
    }
}

class MagoOscuro extends Mago{
    
    public function atacar(){
     echo("Ataque sexual");
    }
}

?>