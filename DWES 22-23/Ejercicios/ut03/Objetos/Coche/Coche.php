<?php
/*
03. Coche y coche con remolque

Crea una clase Coche. Tendrá atributos (privados):

    matricula
    marca
    carga

Métodos (públicos):

    pintarInformación.
        Escribe: Coche: <matrícula>, <marca> con carga: <carga>
    getters y setters

Crea una clase CocheConRemolque Tendrá atributo (privado):

    capacidad remolque

Método (público):

    getter y setter de capacidad remolque
    Los mismos métodos. (Heredados)
    pintarInformación.
        Escribe: Coche: <matrícula>, <marca> con carga: <carga> y remolque de <remolque>

Crea una clase CocheGrúa, que hereda de Coche Atributo (privado):

    cocheCargado

Método (público):

    cargar(Coche)
    descargar()
    pintarInformación.
        Escribe:

Coche: <matrícula>, <marca> con carga: <carga>.
Lleva Coche: <matrícula>, <marca> con carga: <carga>

o

Coche: <matrícula>, <marca> con carga: <carga>.
No lleva ningún coche.

Crea una página que:

    Cree un array vacío.
    Cree un coche con matrícula 1000, marca BMV, carga 30
    Cree un coche con remolque y matrícula 1001, marca Renault, carga 30 y carga remolque 200
    Cree un coche con matrícula 1002, marca Porche, carga 40
    Cree un coche-grúa con matrícula 1003, marca Ford, carga 20
    Carga el Porche en el coche-grúa
    Crea otro coche con remolque: 1005, Nissan, 22, en el remolque 250
    Crea otro coche grúa con matrícula 1007, Kia, carga 30
    Carga el Nissan en la grúa
    Crea un array
    Mete en el array:
        BMV
        Renault
        El coche grúa Ford
        El coche grúa Kia
        OJO! No metas el Porche, ya va en la grúa.
        OJO! No metas el Nissan, ya va en la grúa
    Utiliza array_walk para pintar en un div cada uno de los Coches

*/

class Coche{
    private $matricula;
    private $marca;
    private $carga;

    public function pintarInformacion(){
        return $this->matricula.", ".$this->marca.", con carga: ".$this->carga;
    }
    
    public function setMatricula($matricula){
        $this->matricula=$matricula;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function setMarca($marca){
        $this->marca=$marca;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function setCarga($carga){
        $this->carga=$carga;
    }

    public function getCarga(){
        return $this->carga;
    }
}
?>