<?php

//acceso a BD, sesión, etc. (tiene que ir en TODAS)
require("./init.php");


//errores para form
$login = "";
$pass = "";
$url = "";
$errorList = [];

//si el user no tiene sesión iniciada
if (!isset($_SESSION['nombre'])) {
    //si el form se ha enviado
    if (isset($_POST['enviar'])) {

        // Correo usuario
        if (isset($_POST["nombre"])) {
            $login = clean_input($_POST["nombre"]);
        }

        $usuario = $conex->findUserByCorreo($login);

        if (empty($usuario)) {
            $errorList[] = "El usuario e incorrecto o no existe";
        }

        // clave
        if (isset($_POST["passwd"])) {
            $pass = $_POST["passwd"];
        }

        //verificamos la pass, si es correcta metemos valores a $_SESSION
        if (password_verify($pass,$usuario["passwd"])) {
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];
            $_SESSION['id'] = $usuario['id'];


            //si el usuario ha pedido recuerdame
            if (isset($_POST['recuerdame']) && $_POST['recuerdame'] == "on" && $_POST['recuerdame'] != "") {
                //generamos token
                $token = $conex->getToken();
                $id = $_SESSION["id"];

                //insertamos token en BD
                $conex->insertToken(array(
                    'id_usuario' => $id,
                    'valor' => $token
                ));

                //creamos la cookie
                setcookie(
                    "recuerdame",
                    $token,
                    [
                        "expires" => time() + 7 * 24 * 60 * 60,
                        /*"secure" => true,*/
                        "httponly" => true
                    ]
                );


            }

            if(isset($_SESSION["privada"])){
                $url = $_SESSION["privada"];
                unset($_SESSION["privada"]);
                header('Location: '.$url);
                exit();
            }else{
                header("Location: index.php");
                exit();
            }
        } else {
            $errorList[] = "nombre/pass incorrectas";
        }
    }
    //si está logueado
} else {
    //redirect al index
    header("Location: index.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <style>
        .error{
            color: red;
        }
    </style>        
</head>

<body>
    <?php include("menu.php"); ?>

    <form action="" method="post">
        <!-- input nombre -->
        Correo: <input type="text" name="nombre" id="nombre" value="<?= $login ?>"><br>
        

        <!-- input password -->
        Password: <input type="password" name="passwd" id="passwd"><br>
        

        <!-- input recuerdame (checkbox) -->
        Recuerdame: <input type="checkbox" name="recuerdame" id="recuerdame"><br>

        <!-- error de user/password incorrectas -->
        
        <?php if (count($errorList) > 0) { ?>
            <p>
                <?php foreach ($errorList as $error) { ?>
                    <div class="error"><?= $error ?></div>
                <?php } ?>
            </p>
        <?php } ?>


        <!-- submit -->
        <input type="submit" value="enviar" name="enviar">
    </form>
    <a href="recovery.php">¿Has olvidado la contraseña?</a>
</body>

</html>