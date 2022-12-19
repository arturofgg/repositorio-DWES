<?php
    try{
        //CREO LA BASE DE DATOS
        $mbd = new PDO('mysql:host=localhost;dbname=usuario_login', "arturo", "arturo12345");

        //EXCEPCIONES PARA POSIBLES FALLOS DE LA CONEXION
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        //RECORRO LA TABLA Y GUARDO LOS ELEMENTOS
        $stmt = $mbd->prepare('SELECT * FROM usuarios WHERE email = :email');
        $stmt->execute();
        $email = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }catch(PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }

   //COMPARAR PASS DE LA BD CON EL DEL $_POST
    $passwordbool = password_verify('$_POST["password"]', 'SELECT pass FROM usuarios.sql WHERE email = $email');

    if($passwordbool) {
        $password = $_POST["pass"]
    }
    $intentos = isset($_SESSION["intento"]) ? $_SESSION["intento"] : $numIntentos;
$intentos--;
$_SESSION["intento"] = $intentos;

?>