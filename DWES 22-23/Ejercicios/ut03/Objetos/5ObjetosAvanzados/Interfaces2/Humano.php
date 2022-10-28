<?php 
class Humano implements videojuegoF{
    use getnom;
    use setnom;
    use atacar;
    use defender;
    use setpos;
    use getpos;

    private $nombre;
    private $posicion = array(
        "x" => 0,
        "y" => 0,
        "z" => 0
    );

    public function aod($eleccion){
        if($eleccion==("puñetazo")){
            $this->atacar();
        }else if ($eleccion==("bloqueo")){
            $this->defender();
        }else echo("Ninguna acción realizada");
    }
}
?>