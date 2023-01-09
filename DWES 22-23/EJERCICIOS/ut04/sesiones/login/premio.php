<?php
session_start();

if(!isset($_SESSION['user'])){
    header('Location: login.php?error=Área privada&url=premio.php&');
    exit;
}

?>
<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>
<body>
<h1>Bienvenido!!</h1>
<?php include('menu.php')?><br>
<img src="img/starstudent.png" />
</body>
</html>