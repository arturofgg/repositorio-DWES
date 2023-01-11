<?php
require("./private_area.php");
require('./db.php');

session_start();
if (isset($_SESSION['user'])) {
    header("Location: foro.php");
    die();
}

if(isset($_POST["submit"])){
    if (isset($_POST["comentario"])) {
        $login = clean_input($_POST["login"]);
    }

    //GUARDO USUARIO Y CONTRASEÑA EN LA BD
    if($password!="" || $register!=""){
        $consulta = $mbd->prepare("INSERT INTO foro {email, pass} VALUES ('$register', '$password')");
    }

    if (isset($_GET["error"])) {
        $errorList[] = $_GET["error"];
    }
}

?>

<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>
<body>
<h1>Bienvenido!!</h1>
<?php include('menu.php')?><br>
<img src="imgs/gordete.jpg" />
<p>HAS ACCEDIDO AL FORO!</p>
<p>
    <label for="comentario">Introduce tu comentario:</label>
    <input type="text" name="comentario" id="comentario" value="">
</p>
</body>
</html>