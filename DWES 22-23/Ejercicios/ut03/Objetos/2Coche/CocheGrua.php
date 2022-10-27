<?php
class CocheGrua extends Coche{
    private ?Coche $cocheCargado;

   
    public function setCocheCargado($cocheCargado){
        $this->cocheCargado=$cocheCargado;
    }

    public function getCocheCargado():Coche{
        return $this->cocheCargado;
    }   

    public function cargar(Coche $coche){
        $this->cocheCargado=$coche;
    }

    public function descargar(){
        $this->cocheCargado=null;
    }

    public function pintarInformacion(){
        if($this->cocheCargado==null){
            return parent::pintarInformacion()."  No lleva ningún coche";
        }else{
            return parent::pintarInformacion()."  Lleva coche:".$this->cocheCargado->pintarInformacion(); 
        }
    }
}
?>