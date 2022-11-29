<?php
namespace UTILIDADEXAMEN;

/*CON EL $_GET pillo EL VALOR DEL NAME DEL INPUT! 
  (ut01/0-3-ejercicios/e-hechos2)*/


//SACAR UNA LETRA ALEATORIA
chr(rand(ord("a"), ord("z")));


//SACAR UN NUMERO ALEATORIO DEL 0 AL 7
mt_rand(0,7);


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



//FORMAS DE DEFINIR ARRAYS
$arrayA = [1, 2 ,3 ,4 ,5 ,6 ,7 ,8 ];
$arrayB = array("Paco", "Paque", "Peque");
$arrayC = [
    [
        "nombre" => "Paco",
        "edad" => 16,
        "nota1" => 2,
        "nota2" => 3
    ], [
        "nombre" => "Jesus",
        "edad" => 14,
        "nota1" => 4,
        "nota2" => 8
    ], [
        "nombre" => "Noland",
        "edad" => 23,
        "nota1" => 5,
        "nota2" => 6
    ]
];



//FOREACH
foreach($arrayC as $key => $value){
    echo ($key. " = " .$value. "<br>");
}

for($i=0; $i<count($arrayC); $i++){
    foreach($arrayC[$i] as $key => $value){
        echo ($key. " = " .$value. "<br>");
    }
}


//ARRAY WALK => RECORRE EL ARRAY EN BASE AL VALOR Y LA CLAVE
array_walk($arrayB, function($value, $key){
    echo("LA clave es ". $key. " y el valor es ".$value). "<br>";
});



//ARRAY_CHUNK => ME DIVIDE EL ARRAY1 EN 4 ARRAYS DE 2 GRUPOS
$f=array_chunk($arrayA, 2);


//ARRAY_FILTER => PRIMERO ESCRIBO EL ARRAY Y DESPUES CREO UN FUNCION QUE LE PASO POR PARAMETRO UNA VARIABLE (QUE ES UN ARRAY) QUE TIENE CONTENIDO EL NOMBRE Y LA EDAD
//SACO EL NOMBRE DE PACO
$e=array_filter($arrayC, function($alumnos){
    return $alumnos["nombre"] == "Paco";
});

//SACO LOS MAYORES DE 15 AÑOS
$d=array_filter($arrayC, function($alumnos){
    return $alumnos["edad"]>15;
});


//ARRAY_MAP => PRIMERO ESCRIBO LA FUNCION Y DESPUES EL ARRAY, RECORRE EL ARRAY ENTERO Y TE GUARDA EL RESULTADO EN OTRO ARRAY
$c=array_map(function($alumnos){
    $media = ($alumnos["nota1"] + $alumnos["nota2"])/2;
    return ($alumnos["nombre"] . " = " . $media);
}, $arrayC);

$b=array_map(function($alumnos){
    $media = ($alumnos["nota1"] + $alumnos["nota2"])/2;
    return [
            "nombre" => $alumnos["nombre"],
            "media" => $media
    ];
}, $arrayC);


//ARRAY_MERGE => COMBINA DOS ARRAYS DISTINTOS 
$a=array_merge($arrayA, $arrayB);


//ARRAY_PUSH => INTRODUCE NUEVOS CAMPOS A TU ARRAY
array_push($arrayB, "HOLA", "QUE", "TAL");
print_r($arrayB);


//ARRAY_REDUCE => ME PILLA CADA UNO DE LOS VALORES DEL ARRAY Y ME LOS REDUCE EN UN ARRAY DE UN UNICO VALOR
//NUMEROS
$g=array_reduce($arrayA, function($carro, $item){
$carro += $item;
return $carro;
});

//CADENAS
$h=array_reduce($arrayB, function($carro, $item){
    $carro .= $item . "<br>";
    return $carro;
    });


//SIZEOF => ME DICE EL NUMERO DE VALORES QUE TIENE EL ARRAY
$i=sizeof($arrayA);


//COUNT => PARA ARRAYS /STRLLEN => PARA CADENAS
count($arrayA);
strlen("hola");


//SORT => ORDENAR UN ARRAY ALFABETICAMENTE
$j=sort($arrayA);


//UNSET Y ARRAY SEARCH
unset($arrayB[2]); //QUITO DE LA KEY (POSICION) 2 EL VALOR
var_dump($arrayB);

$k=array_search("Peque", $arrayB); //BUSCO EL VALOR QUE QUIERO CON SEARCH Y MAS TARDE LO QUITO CON UNSET
unset($arrayB[$k]);
var_dump($arrayB);


//STRVAL E INTVAL => DE INT A STRING Y VICEVERSA
$m = strval(23); 
$n = intval("23");


//USO DEL & EN PARAMETROS DE FUNCIONE

function addCadena(&$cadenaParametro){
    $cadenaParametro .= "y me llamo Paco";
}
$cadena = "Soy el mejor ";
addCadena($cadena);
echo $cadena; //ME VA SACAR LA CADENA ENTERA AL USAR EL & ANTES DEL PARAMETRO EN LA FUNCION
?>