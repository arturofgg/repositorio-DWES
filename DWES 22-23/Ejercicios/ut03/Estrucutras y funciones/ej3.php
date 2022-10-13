<?php 
//Crea una web similar a la anterior pero que pare al finalizar la cadena
//o al encontrar el carácter 'a', tanto minúscula como mayúscula. Usa While

$cadena="polleta";
$i=0;
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
    <?php while($cadena[$i]!="a" && $cadena[$i]!="A" && $i<strlen($cadena)){ ?>
        <h4><?php echo ($cadena[$i] . "</br>")?></h4>
        <?php $i++;?>
    <?php }?>
</body>
</html>
