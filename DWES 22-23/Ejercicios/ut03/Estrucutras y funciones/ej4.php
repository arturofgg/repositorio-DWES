<?php 
//Crea una página web que escriba span con números aleatorios entre 0 y 100,
//el proceso parará cuando el número acabe en 17 o sea primo.

function esPrimo($num){
    $valido=true;
    for($i=2;$i<=$num/2 && $valido; $i++){
        if(($num % $i)==0){
            $valido=false;
        }
    }
    return $valido;
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
        
        <?php while($num !=17 && !esPrimo($num)){ ?>
        <?php $num=mt_rand(0,100); ?>
        <span> <?php echo $num. "</bR>"?></span>
        
        <?php }?>
    </body>
    </html>
