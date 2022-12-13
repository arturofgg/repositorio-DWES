<?php
class BancoMalvado implements Interfaces{
    public function estableceConexión():bool{
        echo("Conexion con Banco Malvado");
    }
    public function compruebaSeguridad():bool{
        echo("Comprueba seguridad Banco malvado");
    }
    public function pagar($cuenta, $cantidad){
        echo("pago realiazo con cuenta ".$cuenta." un total de ". $cantidad);
    }
}
?>