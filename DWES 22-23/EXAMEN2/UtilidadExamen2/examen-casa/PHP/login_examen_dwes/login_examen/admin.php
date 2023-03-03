<?php

session_start();

if(!isset($_SESSION["user"])){
    $_SESSION["admin"] = $_SERVER["REQUEST_URI"];
    header("Location: login.php?permiso=No&seccion=admin");
}else if($_SESSION['nb_grupo'] != "admin"){
    header("Location: login.php");
    die();
}

?>
<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>
<body>
<h1>Bienvenido!!</h1>
<?php include('menu.php')?>
<p>Información solo para admin</p>
</body>
</html>
