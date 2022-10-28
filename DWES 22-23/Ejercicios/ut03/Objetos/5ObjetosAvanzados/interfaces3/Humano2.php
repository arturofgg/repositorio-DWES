<?php 
class Humano implements videojuegoF{
    use posicion;
     public function atacar(){
        echo("puñetazo"); 
    }

    public function defender(){
        echo("bloqueo");    
    }
}

?>