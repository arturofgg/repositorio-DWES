<?php 

if(isset($_SESSION["nombre"])){
    $id = $_SESSION["id"];

    $foto = $conex->foto($id);

    $img = $foto["img"];

}



?>

<h1>Hola <?=$username?></h1>
<a href="index.php">index</a>
<?php if(!isset($_SESSION['nombre'])) { ?>
    <a href="login.php">login</a>
    <a href="register.php">register</a>
<?php } ?>

<a href="privada.php">private (privada)</a>

<?php if(isset($_SESSION['nombre'])) { ?>
    <a href="perfil.php">Perfil</a>
    <a href="logout.php">logout</a>
<?php } ?>
<?php if(empty($img) && isset($_SESSION["nombre"])) { ?>
    <img src="./img/login.png">
<?php } else {?>
    <img src="<?= $img ?>">
<?php  } ?>
    
<hr>