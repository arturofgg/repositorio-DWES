<?php 
//Crea una función que concatene todas las cadenas pasadas como parámetro 
//utilizando el primer parámetro como seprador. PRUEBAS: Escribe una web que llame a la función 3 veces con cadenas.

function concatenar($separador, ...$texto){
$nString="";
for($i=0;$i<count($texto);$i++){
    if($i>0){
    $nString=($nString . $separador . $texto[$i]);
    //$nString.= ($separador . $texto[$i]);
    }else $nString=($nString . $texto[$i]);
}
return $nString;
}

echo concatenar(" ☭ ", "Hola", "Pollete", "Hola","pollete");
?>
