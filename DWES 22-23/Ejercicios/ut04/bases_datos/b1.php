<!--
PDO
=========================================
testConnectionPDO.php
-->
<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=proyectoEventos', "arturo", "arturo12345");

    // Utilizar la conexión aquí
    $resultado = $mbd->query('SELECT * FROM Ciclistas');

    foreach ($resultado as $fila){
      foreach ($fila as $clave => $valor){
        echo $clave . " " . $valor . "\n";
      }
      echo "<br>";
    }

    // Ya se ha terminado; se cierra
    $resultado = null;
    $mbd = null;

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "\n";
    die();
}

?>
<!--
PDO
=========================================
testConnectionPDO.php
-->