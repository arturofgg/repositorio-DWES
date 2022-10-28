<?php
/*Está creando un aplicación con pasarela bancaria, en el momento en el que estás solo tienes integración con el Banco: BancoMalvado. En el futuro del proyecto podrá integrarte con otras pasarelas de pago.

Para todos los pagos debemos:

    establecer conexión
    comprobar seguridad
    pagar

Para poder en el futuro hacer que tu aplicación funcione con otras pasarelas de pago has decidido crear una Interfaz.

interface PlataformaPago
{
    public function estableceConexión():bool;
    public function compruebaSeguridad():bool;
    public function pagar(string cuenta, int cantidad);
}public function estableceConexión():bool
    conexión BancoMalvado
    conexión segura BancoMalvado
    Pago realizado BancoMalvado

Realiza un página que cree una conexión con BancoMalvado y realice las 3 acciones.
Otra implementación

Tu aplicación ha tenido mucho éxito y han decidido integrarse dos nuevas plataformas de pago.

Haz una implementación de estas dos plataformas:

    BitCoinConan
    BancoMaloMalísimo

Ahora modifica la página anterior para que de forma aleatoria se realice el pago con alguna de las plataformas.

NOTA: Debes utilizar Polimorfismo.
*/

interface PlataformaPago{
    public function estableceConexión():bool;
    public function compruebaSeguridad():bool;
    public function pagar($cuenta, $cantidad);
    }

?>