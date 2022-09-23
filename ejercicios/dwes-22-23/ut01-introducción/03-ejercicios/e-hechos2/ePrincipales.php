<?php
$saludo = 'Hola mundo';

$nombre = 'Hola buenas!';
//$_GET Informacion de la cabecera
$r=$_GET["radio"];
$pi=3.14;

$var=2;
$var2=4;
?>
<html>
    <head>
        <title>ePrincipales</title>
        <link rel="stylesheet" href="ePrincipales.css"/>
    </head>
<body>
    <!1>
    <h1><?php echo "Hola mundo"?></h1></br>
    <!2>
    <?php echo $saludo ?></br>
    <!3>
    <?php echo $saludo . " esta pagina ha sido programada por arturo" ?></br>
    <!4>
    <?php echo $saludo ?> <i> esta pagina</i> <i><b>ha sido programada por arturo</i></b></br>
    <!5>
    <form action="ePrincipales.php" method="get">
        Radio: <input type="number" name="radio" value="$r"/>
        <input type="submit" value="calcular">
    </form>
    <p><?php echo $nombre. " el area es " . $pi*($r*$r) . ' y su perimetro es ' . 2*$pi*$r?></p>
</body> 
</html>//$_GET Informacion de la cabecera