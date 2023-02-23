<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header('Location: login.php?error=Área privada&url'.$_SERVER['REQUEST_URI']);
    exit;
};
