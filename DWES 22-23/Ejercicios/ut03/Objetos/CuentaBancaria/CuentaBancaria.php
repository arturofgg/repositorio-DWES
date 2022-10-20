 <?php
 /*
    Crea la clase CuentaBancaria
Atributos:
    numerocuenta
    nombre
    saldo
Los números de cuenta se crearán de forma consecutiva después del 100001. Debes utilizar elementos estáticos
Métodos:
    constructor con todos los parámetros y valores por defecto ('anónimo', saldo 0)
    ingresar(float)
    retirar(float)
    saldo():float
    transferirA(CuentaBancaria, cantidad):
        La cuenta que recibe el mensaje transfiere la cantidad a la otra cuenta

    unirCon(CuentaBancaria):
        La cuenta que recibe el mensaje coge el saldo de la que es pasada como parámetro
        La cuenta que es pasada como parametro se queda con saldo 0 y numerocuenta -1. Indicando que ya no útil
        $cuentaA->unir($cuentaB)

    bancarrota(): Asigna el saldo a cero
    mostrar: muestra un div con la información en varios span. Utiliza clases css por si luego le quieres dar estilo

Páginas:
Crea una página con tres cuentas:
    Milloneti, saldo 1000000
    Agapito, saldo 30345
    Pobretón, saldo -10000
Secuencia de acciones:
    Haz que el Milloneti tenga 100 retiradas de 1000 euros
    Haz que Agapito tenga un ingreso de 1200 euros
    Muestra el saldo de las 3 cuentas. Solo el saldo.
    Pobretón ha hackeado el banco y ha conseguido unir la cuenta del Milloneti a la suya.
    Agapito es buena persona y decide transferir la mitad de su salario a Milloneti para que rehaga su vida.
    Muestra el detalle (método mostrar) de las 3 cuentas.
    */

class CuentaBancaria{
    public $numerocuenta;
    public $nombre;
    public $saldo;
    public static $prefijo=1000000;

    public function __construct(string $nombre="anónimo",float $saldo=0){
        self::$prefijo+=1;
        $this->numerocuenta=self::$prefijo;
        $this->nombre=$nombre;
        $this->saldo=$saldo;
    }

    public function ingresar(float $cantidadMas){
        $this->saldo+=$cantidadMas;
    }

    public function retirar(float $cantidadMenos){
        $this->saldo-=$cantidadMenos;
    }

    public function saldo(){
        return $this->saldo;
    }

    public function transferirA($cuenta, $cantidad){
        $this->retirar($cantidad);
        $cuenta->ingresar($cantidad);
    }  

    public function mostrar(){
        return $this->numerocuenta." ".$this->nombre." ".$this->saldo. "</br>";   
    }

    public function unirCon($cuenta){
        $this->ingresar($cuenta->saldo());
        

    }
}
?>