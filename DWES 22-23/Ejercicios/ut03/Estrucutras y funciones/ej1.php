<?php 
 //Crea una página web que genere 3 números aleatorios "mt_rand()", 
 //con sentencias condicionales los asigna a tres variables: mayor, mediano y pequeño. 
 //Después los mostrará en h1, h2 y h3 respectivamente.

$array=[];

for($i=0;$i<3;$i++){
    $array[$i]= mt_rand(0,10);
}

if($array[0]>=$array[1] && $array[0]>=$array[2]){
    $mayor=$array[0];
    
        if($array[1]>=$array[2]){
            $mediano=$array[1];
            $pequeno=$array[2];
        }else {
            $mediano=$array[2];
            $pequeno=$array[1];
        }
    }

if($array[1]>=$array[0] && $array[1]>=$array[2]){
$mayor=$array[1];

    if($array[0]>=$array[2]){
        $mediano=$array[0];
        $pequeno=$array[2];
    }else {
        $mediano=$array[2];
        $pequeno=$array[0];
    }
}

if($array[2]>=$array[0] && $array[2]>=$array[1]){
    $mayor=$array[2];
    
        if($array[0]>=$array[1]){
            $mediano=$array[0];
            $pequeno=$array[1];
        }else {
            $mediano=$array[1];
            $pequeno=$array[0];
        }
    }
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
   <h1><?php echo $mayor?></h1></br>
    <h2><?php echo $mediano?></h2></br>
    <h3><?php echo $pequeno?></h3></br>
</body>
</html>