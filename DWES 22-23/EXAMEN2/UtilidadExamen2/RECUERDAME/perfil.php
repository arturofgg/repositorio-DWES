<?php 

require("./init.php");


$id = $_SESSION["id"];
$carpeta = "./img/";


if(isset($_POST["submit"])){

    $origen = $_FILES["imagen"]["tmp_name"];
    $nbFicheroCompleto = $_FILES["imagen"]["name"];
    $tamannio = $_FILES["imagen"]["size"];
    $tipo = $_FILES["imagen"]["type"];
        
    $nbFichero = explode('.',$nbFicheroCompleto)[0];
    $extension = explode('.',$nbFicheroCompleto)[1];

    //imagen . txt
        
    if(!file_exists($carpeta)){
        mkdir($carpeta,0777,true);
    }

    $bd = $conex->foto($id);

    if($bd != NULL){
        move_uploaded_file($origen,$carpeta.$nbFicheroCompleto);
        $conex->actualizarFoto(array(
            'img'=> $carpeta.$nbFichero.'.'.$extension,
            'id'=> $id
        ));
    }

    $_SESSION["foto"] = $carpeta.$nbFichero.'.'.$extension;
    header('Location: index.php');
       
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cambio de foto</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <link rel="stylesheet" href="./css/login.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="offset-md-2 col-md-8" id="centro">
                    <div class="card">
                        <div class="card-body" id="formulario">
                            <form action="" method="post" class="login" enctype="multipart/form-data">
                                <h3>
                                    Introduzca una imagen para cambiarla
                                </h3>
                                
                                <div class="campo row">
                                    <div class=" col-md-3">
                                        <label for="imagen">Foto:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" name="imagen" id="imagen" class="form__field">
                                    </div>
                                </div>
                                <br>
                                <p class="d-grid gap-3">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Cambiar foto</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>