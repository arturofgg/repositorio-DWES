<?php
class UsuarioPremium extends Usuario {
    public const CANVIC = 3;

    public function __construct(string $nombre = "", string $apellidos = "", string $deporte = "") {
        parent::__construct($nombre, $apellidos, $deporte);
    }

    public function setNombre(string $nombre) {
        parent::setNombre($nombre." (Premium)");
        return $this;
    }
}

?>