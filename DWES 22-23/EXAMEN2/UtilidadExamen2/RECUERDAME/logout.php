<?php

    //acceso a BD, sesión, etc. (tiene que ir en TODAS)
    require("./init.php");


    //Destruimos la sesión
    session_destroy();

    //Destruimos las cookies (necesario para el recuerdame)
    if(isset($_COOKIE["recuerdame"])){

        $conex->borrarToken($_COOKIE["recuerdame"]);


        setcookie("recuerdame", null, time()-1);
    }
    setcookie("PHPSESSID", null, time()-1);
    
    //redirect a página anterior
    header('Location: index.php');
    die();

?>