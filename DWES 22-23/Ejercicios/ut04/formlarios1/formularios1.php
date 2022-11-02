
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    SERVER: <?php print_r($_SERVER); ?> <hr>
    GET: <?php print_r($_GET); ?> <hr>
    POST: <?php print_r($_POST); ?> <hr>

    <form action="formularios1.php" name="formulario">
        Nombre:   <input type="text" id="name" name="user_name"></br>
        </br>Apellido:   <input type="text" id="apellido" name="user_apellido"></br>
        </br>Color:   <input type="color" id="color" name="color"></br>
        </br><textarea type="text-area" id="text-area" name="area" cols="10" rows="10"></textarea></bR>
        </br><input type="submit" value="enviar"></br></br>
    </form>

    <?php
    //Sacar de la info del SERVER el sistema operativo con el HHTP_USER_AGEMT y explode.
    $a1 = $_SERVER["HTTP_USER_AGENT"];
        $a2 = explode(" ",$a1);
    ?>

    <?php 
    //sacar de la info del SERVER con explode el idioma
        $a3 = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
        $a4 = explode("-",$a3);
        $a5 = explode(",",$a4[0]);
    ?> </bR>
    </br> Idioma utilizado: 
    <?php
        $idioma=$a5[0];
        echo ($idioma);
    ?></bR>
    
    <?php 
    //definir segun el idioma de la url el idioma del texto
    if($idioma=="es"){
        echo("Idioma en español");
    ?> 
    <BR>Estas usando:
    <?php
    }else if ($idioma=="en"){
        echo("Idioma en ingles");
    ?>
    <bR>System used:
    <?php
    }else if ($idioma=="ch"){
        echo("你好佩普瓜迪奧拉");
    ?>
    <BR>普瓜:
    <?php
    }
    print_r($a2[2]);
    ?>
    
</body>
</html>