<?php
    require('AccesoDatos.php');
    session_start();

    $id = $_SESSION["id"];
    $perfil;

    if(isset($_SESSION["user"])){
        $conex = AccesoDatos::getSingletone();

        $foto = $conex->fotos($id);

        if($foto != 0){
            
            $perfil = $conex->fotosAll($id);
    
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Principal</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <style>
            * {
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
            }
            body{
                background-color: indigo;
            }
            nav{
                width: 100vw;
                height: 5vh;;
                background-color: black;
                color: white;
            }
            .alinear{
                margin-left: 10vw;
            }
            button{
                margin: 7px 5px;
                border: 1px solid blue;
                background-color: blue;
                border-radius: 2px;

            }
            .navegador{
                margin: 10px auto;
                text-align: center;
            }
            a{
                text-decoration: none;
                color: white;
            }
            .foto{
                background-color: white;
                border-color: white;
            }
            marquee{
                margin-top: 30vh;
                background-color: red;
                color: white;
                height: 20vh;
                font-size: 100px;
                
            }
        </style>
    </head>
    <body>
        <div class="contenedor">
            <nav>
                <div class="row">
                    <div class=" col-md-2 navegador">
                        <a href="home.php">Home</a>
                    </div>
                    <div class=" col-md-2 navegador">
                        <a href="documentacion.php">Documentacion</a>
                    </div>
                    <div class=" col-md-2 navegador">
                        <a href="descarga.php">Descargar</a>
                    </div>
                    <div class=" col-md-2 navegador">
                        <a href="contactanos.php">Contactanos</a>
                    </div>
                    <?php if(!isset($_SESSION["user"])){ ?>
                        <div class=" col-md-4">
                            <button class="alinear"><a href="login.php">Iniciar sesión</a></button>
                            <button><a href="registro.php">Registrarse</a></button>
                        </div>
                        <?php } else { ?>
                            <div class=" col-md-4">
                                <button><a href="./logout.php">Cerrar sesión</a></button>
                                <?php if(isset($_SESSION["user"]) && $foto == 0){ ?>
                                    <button class="foto"><a href="./perfil.php"><img src="./img/login.png" width="60px" height="20px"></a></button>
                                <?php }else { ?>
                                    <button class="foto"><a href="./perfil.php"><img src="<?= $perfil[0]["foto"] ?>" width="60px" height="20px"></a></button>
                                <?php } ?>
                            </div>
                        <?php } ?>
                </div>
            </nav>
        </div>
        <marquee dirección = "left" scrollamount="35">
            DWES
        </marquee>
    </body>
</html>