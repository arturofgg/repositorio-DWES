<?php 

//Hacer un numero primo
function esPrimo($n){
    if ($n == 0 || $n == 1){
        return true;
    } else {
        $esprimo = true;
        $c = 2;
        while($esprimo && $c <= ($n/2)) {
            if(($n % $c) == 0 ){
                $esprimo = false;
            }
            $c++;
        }
        return $esprimo;
    }
}

//Sacar una letra aleatoria
chr(rand(ord("a"), ord("z")));

//Sacar un numero aleatorio

?>