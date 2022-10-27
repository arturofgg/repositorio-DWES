<?php
class BancoMaloMalisimo implements Interfaces{
    public function estableceConexión():bool{
        echo("Conexion con BancoMaloMalisimo");
    }
    public function compruebaSeguridad():bool{
        echo("Comprueba seguridad BancoMaloMalisimo");
    }
    public function pagar($cuenta, $cantidad){
        echo("pago realiazo con cuenta ".$cuenta." un total de ". $cantidad);
    }
}
?>