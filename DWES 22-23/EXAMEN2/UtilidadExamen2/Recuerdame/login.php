<?php

require ('AccesoDatos.php');
//require ('paginas.php');


if (!isset($_SESSION["user"])) {

    session_start();
}
const LONG_TOKEN = 32;

function clean_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getToken() {
    return bin2hex(openssl_random_pseudo_bytes(LONG_TOKEN));
}

$login = "";
$pass = "";
$url = "";
$errorList = [];

if (isset($_GET["url"])) {
    $url = $_GET["url"];
} else if (isset($_POST["url"])) {
    $url = $_POST["url"];
}


if (isset($_POST["submit"])) {

    // Correo usuario
    if (isset($_POST["login"])) {
        $login = clean_input($_POST["login"]);
    }

    if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $errorList[] = "Usuario inválido y/o correo inválido";
        //http://php.net/manual/es/filter.filters.php
    }

    // clave
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }
    
    $conex = AccesoDatos::getSingletone();

    $mP = $conex->findUserByCorreo($login);

    $id = $mP["id"]; 

    // $tk = $conex->verToken($id);


    if (!empty($mP) && password_verify($password, $mP["contrasena"])) {
        
        if (isset($_POST["recuerdame"]) && $_POST["recuerdame"] == "on") {

            //Le asignamos a la variable token el valor del token
            $token = getToken();
     
            //Insertamos el token con sus datos correspondientes
            $conex->insertToken(
                array(
                    'id_usuario' => $id,   
                    'valor' => $token
                )
            );

            setcookie("recuerdame", $token, [
                "expires" => time() + (7 * 24 * 60 * 60),
                // "secure" => true,
                "httponly" => true
            ]);
            $_SESSION["token"] = $_COOKIE["recuerdame"];

        }else{
            
            AccesoDatos::getSingletone()->actualizarToken($id);

        }

        $_SESSION["user"] = $login;
        $_SESSION["id"] = $mP["id"];
     

        if(isset($_SESSION["descarga"])){
            $url = $_SESSION["descarga"];
            unset($_SESSION["descarga"]);
            header("Location: $url");
            exit();
        }else if(isset($_SESSION["contactanos"])){
            $url = $_SESSION["contactanos"];
            unset($_SESSION["contactanos"]);
            header("Location: $url");
            exit();
        }else if(isset($_SESSION["documentacion"])){
            $url = $_SESSION["documentacion"];
            unset($_SESSION["documentacion"]);
            header("Location: $url");
            exit();   
        }else{
           header('Location: index.php');
           exit();   
        }
    } else {
        $errorList[] = "Contraseña errónea";
    }
    
}

if (isset($_GET["error"])) {
    $errorList[] = $_GET["error"];
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <link rel="stylesheet" href="./css/login.css">

    </head>
    <body>
        <?php if(isset($_GET["permiso"])) { ?>
            <center>
                <h3 id="mal">
                    <img src="./img/error.jpeg">Para acceder a la sección de <?= $_GET["seccion"] ?> necesitas iniciar sesión o crearte una cuenta.
                </h3>
            </center>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-8" id="centro">
                    <div class="card">
                        <div class="card-body" id="formulario">
                            <form action="login.php" method="post" class="login">
                                <h3>
                                    Inicio de sesión
                                </h3>
                                
                                <div class="campo row">
                                    <div class=" col-md-3">
                                        <label for="login">Correo:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="login" id="login" placeholder="Introduzca su correo" class="form__field" value="<?= $login ?>">
                                    </div>
                                </div>
                                <div class="campo row">
                                    <div class=" col-md-3">
                                        <label for="pass">Contraseña:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="password" id="pass" class="form__field" value="" placeholder="Introduzca su contraseña">
                                    </div>
                                </div>
                                <div class="campo row">
                                    <div class=" col-md-3">
                                        <label for="recuerdame">Recuerdame:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="checkbox" id="recuerdame" name="recuerdame" <?php if(isset($_SESSION["token"])) echo "checked" ?>>
                                    </div>
                                </div>
                                <br>
                                <p class="d-grid gap-3">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Iniciar sesion</button>
                                </p>
                                <?php if (count($errorList) > 0) { ?>
                                    <p>
                                        <?php foreach ($errorList as $error) { ?>
                                            <div class="error"><?= $error ?></div>
                                        <?php } ?>
                                    </p>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                    <div class="barra nuevo">
                        <h5>
                            ¿Eres nuevo?
                        </h5>
                        <hr>
                    </div>
                    <p class="d-grid gap-3 nuevo">
                        <a class="btn btn-primary" href="./registro.php">Crear cuenta</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>