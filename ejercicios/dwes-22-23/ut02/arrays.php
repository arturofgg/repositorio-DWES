<?php

$fechas=[
    0 => [' ',' Lunes' ,' Martes ',' Miercoles ',' Jueves ',' Viernes '],
    1 => ['16:00-16:55','DWEC','ITGS_DAW','DIW','EIE_DAW','DWES'],
    2 => ['16:55-17:50','DWEC','DAW','DIW','DAW','DWES'],
    3 => ['17:50-18:45','DWEC','DAW','DIW','DAW','DWES'],
    4 => [' ','RECREO','RECREO','RECREO','RECREO','RECREO'],
    5 => ['19:10-20:05','EIE_DAW','DIW','DWES','DWES','DWEC'],
    6 => ['20:05-21:00','EIE_DAW','DIW','DWES','DWES','DWEC'],
    7 => ['21:00-21:55','ITGS_DAW','DIW','DWES','DWES','DWEC'],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio arrays</title>
</head>
<body> 
   
        <table>
        <?php for($j=0; $j<count($fechas); $j++){ ?>
            <tr>
            <?php for($i=0; $i<count($fechas[$j]); $i++){ ?>
                <td><?php echo $fechas[$j][$i]?></td>
             <?php } ?>
            </tr>
            <br>
        <?php } ?>
        </table>
    
</body>
</html>