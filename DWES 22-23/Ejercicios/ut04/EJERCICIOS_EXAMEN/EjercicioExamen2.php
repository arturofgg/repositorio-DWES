<?php
/*
Arrays y funciones (2.5 puntos)
Sopa de letras
Vamos a crear un juego de funciones para manejar una sopa de letras, para
reducir la dificultad del examen la sopa de letras solo contendrá una única
palabra.
(0.5) inicializaSopaLetras($tablero, $n, $m);
Genera una tablero con letras aleatorias de nxm celdas
(0.25) pintaTablero($tablero)
Muestra el HTML del tablero.
(0.5) colocaPalabraHorizontal($tablero, $palabra);
Coloca la palabra dentro del tablero en una posición aleatoria de forma horizontal
NOTA: Posición aleatoria, debe tener en cuenta si se sale del tablero
(0.5) colocaPalabraVertical($tablero, $palabra);
NOTA: Posición aleatoria, debe tener en cuenta si se sale del tablero
(0.25) colocaPalabraHorizontalAlreves($tablero, $palabra);
(0.25) colocaPalabraVerticalAlreves($tablero, $palabra);
(0.25) colocaPalabra($tablero, $palabra);
La colocará de una forma aleatoria (Sin diagonales)
*/
$tablero; 

function inicializaSopaLetras($tablero, $n, $m){
 for($i=0; $i<$n;$i++){
  echo ("<tr>");
    for($j=0; $j<$m;$j++){
      echo ("<td>" . $tablero[$n][$m] = chr(rand(ord("a"), ord("z"))) . "</td>");
    }
  echo ("</tr>");  
  }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOLA</title>
</head>
<body>
  <table>
    <?php inicializaSopaLetras($tablero, 4, 5)?>
  </table>
</body>
</html>