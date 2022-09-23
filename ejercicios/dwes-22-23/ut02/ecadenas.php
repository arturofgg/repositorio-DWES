<?php
$text="";
$letra=0;
$vocales=0;
$consonantes=0;
$letra1="";
$letra2="";
$palindromo=true;

if (isset($_GET['texto'])){
    $text= $_GET['texto'];
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio cadenas</title>
    <style>
    body {
           background-color:blue;
           text-align:center;
        }
        div {
            margin: 0 auto;
            color:white;
            font-size:30px;
            font-family:arial;
        }
        h1 {
            text-align: center;
            font-family:sans-serif;
        }
    </style>
</head>
<body>
    <form action="ecadenas.php" method="get">
        <input type="text" name="texto" placeholder="Escribe aquí "value="<?=$text?>">
        <input type="submit" value="aceptar">
    </form><br>

       <?php for($i=0; $i<strlen($text); $i++) {
            $letra=$text[$i];
                 if($letra == 'a' || $letra == 'e' || $letra == 'i' || $letra == 'o' || $letra == 'u'){
                    $vocales++;
                }else if($letra == ' ' || $letra == '?'|| $letra == '!'|| $letra == '¿' || $letra == '¡'|| $letra == '+'|| $letra == '-' || $letra == '*'|| $letra == '/'|| $letra == ':'|| $letra == ';'|| $letra == '_'|| $letra == '('|| $letra == ')'|| $letra == '&'|| $letra == '%'|| $letra == '#' || $letra == '@'|| $letra == 'º'|| $letra == '['|| $letra == ']'|| $letra == '{'|| $letra == '}'|| $letra == '~'){
                }else{
                $consonantes++;
                }
            }?>

        <?php for($j=0; $j<strlen($text)/2 && $palindromo; $j++){
            $letra1=$text[$j];
            $letra2=$text[strlen($text)-$j-1];
            if($letra1 !== $letra2){
                $palindromo=false;
            }
        }?>
    <div>
    <?php echo "La palabra es " . $text?></br>
    <?php echo "Numero de vocales: " . $vocales?></br>
    <?php echo "Numero de consonantes: " .$consonantes?></br>
    <h1>
    <?php if($palindromo){
        echo "Es palindromo";
    }else{
        echo "No es palindromo";
    }?></br>
    </h1>
    </div>
</body>
</html>