<?php
session_start();
echo $_SESSION["user"];
?>

<div class="menu">
  <a href="privado.php">privado</a>
  <a href="publico.php">público</a>
</div>
