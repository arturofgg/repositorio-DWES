<?php

require ('AccesoDatos.php');

if (!isset($_SESSION["user"])) {

    session_start();
}

function clean_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
        $nombre = clean_input($_POST["login"]);
    }

    if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $errorList[] = "Usuario inválido y/o correo inválido";
    }

    // clave
    if (isset($_POST["password"])) {
        $secreto = $_POST["password"];
    }
    
    $conex = AccesoDatos::getSingletone();

    $mP = $conex->findUserByCorreo($nombre);

    if (!empty($mP) && password_verify($secreto, $mP["secreto"])) {
        
        $_SESSION["user"] = $nombre;
        $_SESSION["id"] = $mP["id"];
        $id_grupo = $mP["id_grupo"];

        $mG = $conex->findUserById($id_grupo);
        $_SESSION["nb_grupo"] = $mG["nombre"];
     
        if(isset($_SESSION["admin"])){
            $url = $_SESSION["admin"];
            unset($_SESSION["admin"]);
            header("Location: $url");
            exit();
        }else if(isset($_SESSION["privado"])){
            $url = $_SESSION["privado"];
            unset($_SESSION["privado"]);
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
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>
<body>
<h1>Bienvenido!!</h1>
<?php include('menu.php')?>
<form action="login.php" method="post" class="login">
    <p>
      <label for="login">Email:</label>
      <input type="text" name="login" id="login" value="<?=$login?>">
    </p>

    <p>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" value="">
    </p>

    <?php if (count($errorList) > 0) { ?>
      <p>
        <?php foreach ($errorList as $error) { ?>
          <div class="error"><?= $error ?></div>
        <?php } ?>
       </p>
     <?php } ?>

    <p class="login-submit">
      <label for="submit">&nbsp;</label>
      <button type="submit" name="submit" class="login-button">Login</button>
    </p>
</form>
</body>
</html>