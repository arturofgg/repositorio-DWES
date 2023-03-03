<?php
session_start();
require ('AccesoDatos.php');
$conex = AccesoDatos::getSingletone();

$token = $_GET['token'];
$tt = $conex->pToken($token);

$id_user = $tt["id_user"];
$tu = $conex->findUserById($id_user);
$email=$tu["email"];

$_SESSION["user"] = $email;
$_SESSION["id"] = $tu["id"];

if (isset($_SESSION["user"])){
    header('Location: privado.php');
}

?>


