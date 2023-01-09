<?php
    try{
        //EXCEPCIONES PARA POSIBLES FALLOS DE LA CONEXION
        $options = [
            PDO::ATTR_ERRMODE => false,
            PDO::ERRMODE_EXCEPTION => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
         //CREO LA BASE DE DATOS
         $db = new PDO('mysql:host=localhost;dbname=usuario_login', "arturo", "arturo12345", $options);

    }catch(PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }
?>