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

Class MagoBlanco extends Mago implements videojuegoF{
    
    public function aod($eleccion){
        if($eleccion==("ataque de luz")){
            $this->atacar();
        }else if ($eleccion==("hechizo protector")){
            $this->defender();
        }else echo("Ninguna acción realizada");
    }
}

Class MagoOscuro extends Mago implements videojuegoF{
    
    public function aod($eleccion){
        if($eleccion==("ataque de oscuridad")){
            $this->atacar();
        }else if ($eleccion==("hechizo protector")){
            $this->defender();
        }else echo("Ninguna acción realizada");
    }
}

?>