<?php
require("./db.php");

session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    die();
}

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = "";
$password = "";
$url = "";
$errorList = [];

    if (isset($_GET["url"])) {
        $url = $_GET['url'];
    } else if (isset($_POST['url'])) {
        $url = $_POST['url'];
    }

    //CONSULTA PARA TENER EN UNA VARIABLE LOS DATOS DE LA BASE DE DATOS
    $consulta = $mbd->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
    $consulta->execute([":email" => $email]);
    $usuario = $consulta->fetch();

    if(isset($_POST["submit"])){
        //EMAIL
        if ($usuario["email"] == $_POST["email"]) {
            $errorList[] = "ESTE EMAIL YA EXISTE";
        }else {
            $email = clean_input($_POST["email"]);
        }
    
        //PASSWORD
        if (isset($_POST["password"]) && isset($_POST["password2"]) && $_POST["password"]==$_POST["password2"]) {
            $password = password_hash(clean_input($_POST["password"]), PASSWORD_DEFAULT); 
        }else {
            $errorList[] = "Las claves no coinciden";
        }
    }

    if ($password!="" || $email!="") {
        $consulta = $mbd->prepare("INSERT INTO usuarios (email, pass) VALUES (:email, :password)"); 
        $consulta->bindValue(':email', $email); 
        $consulta->bindValue(':password', $password); 
        $consulta->execute();
    }

    if (isset($_GET["error"])) {
        $errorList[] = $_GET["error"];
    }
?>


<html>

<head>
    <title>registro</title>
</head>

<body>
    <h1>REGISTRO</h1>
    <form action="registro.php" method="post">
        <p>
            <label>Introduce un email: </label>
            <input type="text" name="email" id="email" value="<?= $email ?>">
            <input type="hidden" name="url" id="url" value="<?= $url ?>">
        </p>
        <p>
            <label>Introduce una contraseña: </label>
            <input type="password" name="password" id="password" value=""><br>
            <label>Introducela de nuevo: </label>
            <input type="password" name="password2" id="password2" value="">
        </p>
        <p>
            <?php if (count($errorList) > 0) { ?>
            <p>
                <?php foreach ($errorList as $error) { ?>
                    <div class="error"><?= $error ?></div>
                <?php } ?>
            </p>
           <?php } ?>
        </p>
        <p>
            <label for="submit">&nbsp;</label>
            <button type="submit" name="submit" class="login-button">register</button>
        </p>
    </form>
</body>

</html>