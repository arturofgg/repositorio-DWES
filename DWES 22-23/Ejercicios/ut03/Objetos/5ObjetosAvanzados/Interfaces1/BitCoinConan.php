<?php
class BitCoinConan implements Interfaces{
    public function estableceConexión():bool{
        echo("Conexion con BitCoinConan");
    }
    public function compruebaSeguridad():bool{
        echo("Comprueba seguridad BitCoinConan");
    }
    public function pagar($cuenta, $cantidad){
        echo("pago realiazo con cuenta ".$cuenta." un total de ". $cantidad);
    }
}
?>