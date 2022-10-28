<?php 
abstract class Mago implements videojuegoF {
    use getnom;
    use setnom;
    use atacar;
    use defender;
    use setpos;
    use getpos;

    private $nombre;
    private $posicion;

    abstract public function aod($eleccion);

}

class MagoBlanco extends Mago{
    
    public function aod($eleccion){
        if($eleccion==("ataque de luz")){
            $this->atacar();
        }else if ($eleccion==("hechizo protector")){
            $this->defender();
        }else echo("Ninguna acción realizada");
    }
}

class MagoOscuro extends Mago{
    
    public function aod($eleccion){
        if($eleccion==("ataque de oscuridad")){
            $this->atacar();
        }else if ($eleccion==("hechizo protector")){
            $this->defender();
        }else echo("Ninguna acción realizada");
    }
}

?>