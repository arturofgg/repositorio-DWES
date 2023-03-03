<?php 

    //acceso a BD, sesión, etc. (tiene que ir en TODAS)
    require("./init.php");

    //errores para form
    $login = "";
    $pass = "";
    $correo = "";
    $url = "";
    $validos = true;
    $errorList = [];

    //si el user no tiene sesión iniciada
    if (!isset($_SESSION['nombre'])) {
        //si el form se ha enviado
        if (isset($_POST['enviar'])) {


            if (isset($_POST["nombre"])) {
                $validos = $validos && !empty($_POST["nombre"]);
                $nombre = clean_input($_POST["nombre"]);
        
                if(empty($nombre)) {

                    $errorList[] = "Formato de nombre inválido";
                }
            
            }
        
            if(isset($_POST["correo"])){
                $validos = $validos && !empty($_POST["correo"]);
                $correo = clean_input($_POST["correo"]);
                if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
                    $errorList[] = "Usuario inválido y/o correo inválido";
                    
                }
                
            }
        
            if(isset($_POST["passwd"])){
                $validos = $validos && !empty($_POST["passwd"]);
                $pass = $_POST["passwd"];
            }
            

            //si NO hay errores, buscamos al user en la BD
            if ($validos) {
                //comprobamos si el nombre ya existe
                $usuario = $conex->findUserByCorreo($correo);


                //si la consulta está vacía, es que no hay ningún usuario con este nombre
                //entonces, procede a registrarme ese usuario
                if (empty($usuario)) {
                    //insert de user en BD
                    
                        $conex->insertUser(array(
                            'nombre' => $nombre,
                            'passwd' =>  password_hash($pass,PASSWORD_BCRYPT),
                            'correo' => $correo
                        ));

                        $datos = $conex->findUserByCorreo($correo);


                        //le iniciamos la sesión
                        $_SESSION['id'] = $datos['id'];
                        $_SESSION['nombre'] = $datos['nombre'];
                        $_SESSION['correo'] = $datos['correo'];

                        //mail confirmación
                        // Mailer::sendEmail(
                        //     $datos['correo'],
                        //     "Practicando PHP jeje",
                        //     "Bienvenido ".$datos['nombre'].", estoy practicando PHP jeje"
                        // );

                        //redirigimos a la página anterior en caso de que viniese de una
                        if(isset($_SESSION["privada"])){
                            $url = $_SESSION["privada"];
                            unset($_SESSION["privada"]);
                            header('Location: $url');
                            exit();
                        }else{
                            header("Location: index.php");
                            exit();
                        }
                    
                }
            }
        }

    //si el user tiene la sesión iniciada
    }else{
        //redirect a index
        header('Location: index.php');
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
</head>
<body>
    <?php include("menu.php"); ?>

    <form action="" method="post">
        <!-- input nombre -->
        Nombre: <input type="text" name="nombre" id="nombre" value="<?= $nombre ?>"><br>
        

        <!-- input correo -->
        Correo: <input type="text" name="correo" id="correo" value="<?= $correo ?>"><br>
        

        <!-- input pass -->
        Password: <input type="password" name="passwd" id="passwd"><br>
        

        <!-- error nombre repetido -->
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
</body>
</html>