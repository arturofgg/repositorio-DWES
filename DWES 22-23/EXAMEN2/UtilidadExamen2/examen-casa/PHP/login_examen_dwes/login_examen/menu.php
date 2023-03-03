<?php

$admin = "admin";
$profesionales = "profesionales";
$lusers = "lusers";

?>
<div class="menu">
  <a href="index.php">Inicio</a>
  <?php if (isset($_SESSION['user'])) { ?>
    <!-- si el user es admin -->
    <?php if ($_SESSION['nb_grupo'] === $admin) { ?>
      <a href="admin.php">Admin</a>
    <?php } ?>
    <a href="privado.php">Privado</a>
  <?php } ?>
  <?php if (!isset($_SESSION["user"])) { ?>
    <a href="login.php">Login</a>
  <?php } ?>
  <?php if (isset($_SESSION["user"])) { ?>
    <a href="logout.php">Logout</a>
  <?php } ?>
  <?php if (!isset($_SESSION["user"])) { ?>
    <span>No autentificado</span>
  <?php } else if (isset($_SESSION["user"]) && $_SESSION["nb_grupo"] == $admin) { ?>
    <span>Autentificado como admin</span>
  <?php } else if (isset($_SESSION["user"]) && $_SESSION["nb_grupo"] == $profesionales || $grupo == $lusers) { ?>
    <span>Autentificado</span>
  <?php } ?>
</div>