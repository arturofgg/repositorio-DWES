<?php
$claro = isset($_COOKIE["claro"]) ? $_COOKIE["claro"] : 0;
setcookie("galleta","chipchahoy");
setcookie("claro",$claro +  1);

print_r($_COOKIE);
?>