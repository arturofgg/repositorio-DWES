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

if (isset($_POST["submit"])) {
    if (isset($_POST["email"])) {
        $email = clean_input($_POST["email"]);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorList[] = "Usuario inválido";
    }

    if (isset($_POST["password"])) {
        $password = clean_input($_POST["password"]);
    }
}

$consulta = $mbd->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
$consulta->execute([":email" => $email]);
$usuario = $consulta->fetch();
print_r($usuario);

if (isset($usuario) && password_verify($password, $usuario["pass"])) {
    $_SESSION["usuario"] = $email;
    if ($url != "") {
        header('Location: ' . $url);
    } else {
        header('Location: index.php');
    }
    exit;
} else {
    $errorList[] = "Clave errónea";
}


if (isset($_GET["error"])) {
    $errorList[] = $_GET["error"];
}
?>


<html>

<head>
    <title>Document</title>
</head>

<body>
    <form action="login.php" method="post">
        <p>
            <label>Introduce tu email: </label>
            <input type="text" name="email" id="email" value="<?= $email ?>">
            <input type="hidden" name="url" id="url" value="<?= $url ?>">
        </p>
        <p>
            <label>Introduce tu contraseña: </label>
            <input type="password" name="password" id="password" value="<?= $password ?>">
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
            <button type="submit" name="submit" class="login-button">Login</button>
        </p>
    </form>
</body>

</html>