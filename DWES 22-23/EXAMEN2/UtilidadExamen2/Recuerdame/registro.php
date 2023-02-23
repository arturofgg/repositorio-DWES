<?php

require ('AccesoDatos.php');

session_start();


const TEXTO = '/^[a-zA-Z0-9À-ÖØ-öø-ÿ\s\/._-]{1,}$/';
const CORREO = '/^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}$/';
const TELF = '/^\d{9}$/';
//const PASS = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/';
const LONG_TOKEN = 32;

//Funcion que genera un token con la longitud que tiene la constante
function getToken() {
    return bin2hex(openssl_random_pseudo_bytes(LONG_TOKEN));
}

function clean_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$validos = true;
$nombre = "";
$apellidos = "";
$correo = "";
$fecha = "";
$password = "";

$url = "";
$errorList = [];

if (isset($_GET["url"])) {
    $url = $_GET["url"];
} else if (isset($_POST["url"])) {
    $url = $_POST["url"];
}

$bd = AccesoDatos::getSingletone();


if (isset($_POST["submit"])) {

    $validos = true;

    if (isset($_POST["nombre"])) {
        $validos = $validos && !empty($_POST["nombre"]);
        $nombre = clean_input($_POST["nombre"]);
        if(!preg_match(TEXTO,$nombre)){

            $errorList[] = "Formato de nombre inválido";
        }
    }


    if(isset($_POST["apellidos"])){
        $validos = $validos && !empty($_POST["apellidos"]);
        $apellidos = clean_input($_POST["apellidos"]);
        if(!preg_match(TEXTO,$apellidos)){

            $errorList[] = "Formato de apellidos inválido";
        }
    }

    if(isset($_POST["login"])){
        $validos = $validos && !empty($_POST["login"]);
        $correo = clean_input($_POST["login"]);
        if(!preg_match(CORREO,$correo)){

            $errorList[] = "Formato de correo inválido";
        }
        if($bd->existEmail($correo)){

            $errorList[] = "El correo introducido ya esta registrado";

        }
    }
    if(isset($_POST["fecha"])){
        $validos = $validos && !empty($_POST["fecha"]);
        $fecha = $_POST["fecha"];
    }

    if(isset($_POST["pass"])){
        $validos = $validos && !empty($_POST["pass"]);
        $password = $_POST["pass"];
    }


    // Todos los campos llenos
    if ($validos) {
        if(count($errorList) == 0){
            //echo "Hola";
    
            
            $bd->insertUser(array(
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'contrasena' => password_hash($password,PASSWORD_BCRYPT),
                'correo' => $correo, 
                'fecha_nacimiento' => $fecha
            ));
           
            $mP = $bd->findUserByCorreo($correo);
            /*
            echo "<pre>";
            var_dump($mP);
            echo "</pre>";
            */
            //Le asignamos a la variable token el valor del token
            $token = getToken();
            $id = $mP["id"];  
            /*
            echo "<br><br><br><br>";
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
            
            echo "<br><br><br><br>";
            print_r($id);
            echo "<br>";
            print_r($token);
            echo "<br>";
            */
            //Insertamos el token con sus datos correspondientes
            if(isset($_POST["recuerdame"]) && $_POST["recuerdame"] == "on"){
                     
                $bd->insertToken(
                    array(
                        'id_usuario' => $id,
                        'valor' => $token  
                    )
                );
                
                //Añadimos la cookie con el nombre de reuerdame el valor del token y una duracion
                
                setcookie("recuerdame", $token, [
                    "expires" => time() + (7 * 24 * 60 * 60),
                    // "secure" => true,
                    "httponly" => true
                ]);
                $_SESSION["token"] = $_COOKIE["recuerdame"];
            }

            $_SESSION["user"] = $correo;
            $_SESSION["id"] = $mP["id"];
            
            header("Location:index.php");
            die();
        }
    }
    else {
        $errorList[] = "Faltan campos por rellenar";
    }

}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <link rel="stylesheet" href="./css/login.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-8" id="centro">
                    <div class="card">
                        <div class="card-body" id="formulario">
                            <form action="registro.php" method="post" class="login">
                                <h3>
                                    Registro
                                </h3>
                            
                                <div class="campo row">
                                    <div class=" col-md-3">
                                        <label for="login">Nombre:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="nombre" id="nombre" class="form__field" placeholder="Introduzca su nombre" value="<?= $nombre ?>">
                                    </div>
                                </div>
                                
                                <div class="campo row">
                                    <div class=" col-md-3">
                                        <label for="login">Apellidos:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="apellidos" id="ape" class="form__field" placeholder="Introduzca sus apellidos" value="<?= $apellidos ?>">
                                    </div>
                                </div>
                               
                                <div class="campo row">
                                    <div class=" col-md-3">
                                        <label for="login">Correo:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="login" id="login" placeholder="Introduzca su correo" class="form__field" value="<?= $correo ?>">
                                    </div>
                                </div>
                                
                                <div class="campo row">
                                    <div class=" col-md-3">
                                        <label for="login">Contraseña:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="pass" id="pass" class="form__field" value="" placeholder="Introduzca su contraseña">
                                    </div>
                                </div>

                                <div class="campo row">
                                    <div class=" col-md-3">
                                        <label for="login">Fecha:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" name="fecha" id="fecha" class="form__field" value="<?= $fecha ?>">
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
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Crear cuenta</button>
                                </p>
                                <br>
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
                </div>
            </div>
        </div>
    </body>
</html>