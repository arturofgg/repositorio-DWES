<?php
class UsuarioAdmin extends Usuario {

    public function __construct(string $nombre = "admin",string $apellidos = "", string $deporte = "") {
        parent::__construct($nombre, $apellidos, $deporte);
    }

    public function setNombre(string $nombre): Usuario {
        parent::setNombre($nombre." (Admin)");
        return $this;
    }

}

?>