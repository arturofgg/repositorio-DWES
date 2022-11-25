<?php

//Debes definir una estructura adecuada para este problema
$tablero = [];
const casillaX = "X";
const casillaO = "O";
const casillaV = "&nbsp";

//funciones

  for($i=0; $i<3;$i++){
    for($j=0; $j<3;$j++){
      $tablero[$i][$j] = casillaV;
    }
  }

//validaciones
if(isset($_POST['posx']) && $_POST['posx'] < 3 && $_POST['posx'] >= 0){
  $posx = $_POST['posx'];
} else {
  echo $errores['posx'] = 'x fuera de rango <br>';
}

if(isset($_POST['posy']) && $_POST['posy'] < 3 && $_POST['posy'] >= 0){
  $posy = $_POST['posy'];
} else {
  echo $errores['posy'] = 'y fuera de rango <br>';
}

if ($_POST["turno"] == "X" || $_POST["turno"] == "O"){
  $turno = $_POST["turno"];
} else {
  echo $errores['turno'] = 'No cambies cosas con el inspeccionar <br>';
}
var_dump($_POST);

//rellenar huecos
if ($turno == "X"){
  $tablero[$posx][$posy] = casillaX;
}

if ($turno == "O"){
  $tablero[$posx][$posy] = casillaO;
}

/*
  file_put_contents(
      "juego.csv",
      "$turno;$posx;$posy\n",
      FILE_APPEND
  );
   // redirect
   header("Location: juego.php");
   exit();
*/

?>

<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
  <title>3 en Raya</title>
</head>
<body>
  <h1>3 en raya</h1>
  <table>
    <tr>
      <td><?= $tablero[0][0] ?></td>
      <td><?= $tablero[0][1] ?></td>
      <td><?= $tablero[0][2] ?></td>
    </tr>
    <tr>
      <td><?= $tablero[1][0] ?></td>
      <td><?= $tablero[1][1] ?></td>
      <td><?= $tablero[1][2] ?></td>
    </tr>
    <tr>
      <td><?= $tablero[2][0] ?></td>
      <td><?= $tablero[2][1] ?></td>
      <td><?= $tablero[2][2] ?></td>
    </tr>
  </table>
  <div class="error">
    Esto es un texto de error
  </div>
  <div class="error">
    Jugador AAA ha ganado
    <a href="">Juego nuevo</a>
  </div>
  <form action="juego.php" method="post">
      turno:
      <select name="turno">
        <option value="X">X</option>
        <option value="O">O</option>
      </select>
      <br>
      x: <input type="text" name="posx" value=""><br>
      y: <input type="text" name="posy" value=""><br>
      <button type="submit" name="submit">Jugar</button>
  </form>
</body>
</html>
