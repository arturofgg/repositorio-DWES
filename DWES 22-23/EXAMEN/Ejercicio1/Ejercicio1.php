<?php 

namespace EXAMEN\Ejercicio1;
//LA PARTE DE HTML NO LA HE HECHO

function pintarCabecera(...$parametro){
    $string="";
    for($i=0; $i<count($parametro); $i++){
            $string .= (" <th>" . $parametro[$i] . "</th> ");
    }
    return "<tr>" . $string . "</tr>";
}

function pintarContenido(...$parametro){
    $string="";
    
    for($i=0; $i<count($parametro); $i++){
            $string .= (" <td>" . $parametro[$i] . "</td> ");
    }
    
    return "<tr>" . $string . "</tr>";
}


function guardarArray(){
    $HORA1 = 9;
    $HORA2 = 10;
    $CEROS = "00";
    $MAX = 14;
    for($i=0; $i<$MAX; $i++){
        if($i==0){
            $horario[$i]= pintarCabecera(".", "LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES");
        }else{
             $horario[$i] = pintarContenido($HORA1 . ":" . $CEROS . "-" . $HORA2 . ":" . $CEROS, ".", ".", ".", ".", ".");
             $HORA1++;
             $HORA2++;
        }
    }
    return $horario;
}

$arrayHorario = guardarArray();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table><?php array_walk($arrayHorario, function($value, $key){ echo($value);}); ?></table>
</body>
</html>

