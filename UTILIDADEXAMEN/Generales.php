<?php
namespace UTILIDADEXAMEN;

/*CON EL $_GET pillo EL VALOR DEL NAME DEL INPUT! 
  (ut01/0-3-ejercicios/e-hechos2)*/


//SACAR UNA LETRA ALEATORIA
chr(rand(ord("a"), ord("z")));


//SACAR UN NUMERO ALEATORIO DEL 0 AL 7
rand(0,7);


//SACAR VOCALES Y CONSONANTES DE UNA CADENA
for($i=0; $i<strlen($text); $i++) {
    $letra=$text[$i];
        if($letra == 'a' || $letra == 'e' || $letra == 'i' || $letra == 'o' || $letra == 'u'){
            $vocales++;
        }else if($letra == ' ' || $letra == '?'|| $letra == '!'|| $letra == '¿' || $letra == '¡'|| $letra == '+'|| $letra == '-' || $letra == '*'|| $letra == '/'|| $letra == ':'|| $letra == ';'|| $letra == '_'|| $letra == '('|| $letra == ')'|| $letra == '&'|| $letra == '%'|| $letra == '#' || $letra == '@'|| $letra == 'º'|| $letra == '['|| $letra == ']'|| $letra == '{'|| $letra == '}'|| $letra == '~'){
        }else{
            $consonantes++;
        }
}


//PALINDROMO
for($j=0; $j<strlen($text)/2 && $palindromo; $j++){
    $letra1=$text[$j];
    $letra2=$text[strlen($text)-$j-1];
    if($letra1 !== $letra2){
        $palindromo=false;
    }
}


//SACAR UN NUMERO PRIMO
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


?>