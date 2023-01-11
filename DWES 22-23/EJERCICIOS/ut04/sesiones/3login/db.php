<?php 

    try{
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $mbd = new PDO('mysql:host=localhost;dbname=usuario_login;charset=utf8mb4', "arturo", "arturo12345", $options);
    }catch(PDOException $e){
        print "Error en BD";
        die();
    }

?>