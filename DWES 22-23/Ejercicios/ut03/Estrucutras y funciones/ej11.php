<?php 
//Crea una función que reciba un array con distintos tipos de valores de tal forma que:
    //Si son enteros: el primer entero sea elevado al cuadrado, el segundo entero sea elevado al cubo 
    //y así sucesivamente con los números enteros.
    // Si el valor es un float lo convertirá a su valor negativo (si es negativo al positivo)
    //Si es una cadena cambiará las mayúsuclas por minúsculas y viceversa.
    //En caso de no estar entre estos valores lo dejará sin modificar.

function genArray(...$valores){
    $arraux=[];
    $cont=2;
    $i=0;
    foreach($valores as $value){
        
        if(gettype($value)=="integer"){
            $arraux[$i]=pow($value,$cont);
            $cont++;
        }
        else if(gettype($value)=="double"){
            $arraux[$i]=$value*(-1);
        }else if(gettype($value)=="string"){
            $arraux[$i]= strtoupper($value);
        }else $arraux[$i]=$value;
        $i++;
    }
    return $arraux;
}

$xd = genArray(3, "h", 'hola', [1,2,3], [1], "h");
print_r($xd);
?>