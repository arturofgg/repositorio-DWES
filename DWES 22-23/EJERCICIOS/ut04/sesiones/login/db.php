<?php
    try{
        //EXCEPCIONES PARA POSIBLES FALLOS DE LA CONEXION
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
         //CREO LA BASE DE DATOS
         $db = new PDO('mysql:host=localhost;dbname=usuario_login;charset=utf8mb4', "arturo", "arturo12345", $options);

    }catch(PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }
?>