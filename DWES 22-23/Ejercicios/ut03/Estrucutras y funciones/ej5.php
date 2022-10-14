<?php 
//Crea una función que escriba lo parámetros recibidos por la URL en una tabla.

$url="ej5.php?valor=estoy&act=recorriendo&un=array"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
            background-color:yellow;
            color:blue;
        }
        
        th{
            background-color:red;
        }
        table{
            width:200px;
            height:200px;
        }

    </style>
</head>
<body>
    <table>
      <tr> <th>Clave</th> <th>Valor</th></tr> 
        <?php //Con el GET pilla de la url los valores que definas y te recorre con el foreach cogiendo las keys y los values ?>
        <?php foreach($_GET as $key => $value){ ?>
            <tr>
              <td><?= $key ?></td> 
              <td><?= $value ?></td>
            </tr>
         <?php } ?>
    </table>
</body>
</html>