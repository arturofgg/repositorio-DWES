<?php
require('./db.php');

session_start();
if (isset($_SESSION['user'])) {
    header("Location: foro.php");
    die();
}

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$register = "";
$password = "";
$url = "";
$errorList = [];


if (isset($_GET["url"])) {
    $url = $_GET['url'];
} else if (isset($_POST['url'])) {
    $url = $_POST['url'];
}

$consulta = $mbd->prepare("SELECT * FROM foro WHERE email = :email LIMIT 1");
$consulta->execute([':email' => $register]);
$user = $consulta->fetch();

if(isset($_POST["submit"])){

    if ($user["email"] == $_POST["register"]) {
        $errorList[] = "Este email ya existe";
    }else {
        $register = clean_input($_POST["register"]);
    }

    //PASSWORD
    if (isset($_POST["password"]) && isset($_POST["password2"]) && $_POST["password"] == $_POST["password2"]) {
        $password = password_hash(clean_input($_POST["password"]), PASSWORD_DEFAULT); 
    }else {
        $errorList[] = "Las claves no coinciden";
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
    <form action="register.php" method="post" class="login">
        <p>
            <label for="register">Email:</label>
            <input type="text" name="register" id="register" value="<?= $register ?>">
            <input type="hidden" name="url" id="url" value="<?= $url ?>">
        </p>

        <p>
            <label for="password">Contraseña:</label>
            <input type="password" name="password2" id="password2" value="">
        </p>


        <p>
            <label for="password2">Confirma la contraseña:</label>
            <input type="password" name="password2" id="password2" value="">
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