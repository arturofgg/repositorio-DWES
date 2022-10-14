<?php 
// Crea una función que sume todos los números entre dos parámetros dados: 
//inicio y fin. PRUEBAS: Escribe una web que llame a la función 10 veces con números aleatorios entre 0 y 20.

function sumaValores($valor1, $valor2){
    if($valor1==$valor2){
        $valorFin=$valor1;
    }
    if($valor1>$valor2){
        $valorFin=0;
        for($i=1; $i<($valor1-$valor2);$i++){
            $valorFin=$valorFin+($valor2+$i);
        }
    }
    if($valor2>$valor1){
        $valorFin=0;
        for($i=1; $i<($valor2-$valor1);$i++){
            $valorFin=$valorFin+($valor1+$i);
        }
    }
    return $valorFin;
}

echo sumaValores(5,21);
?>