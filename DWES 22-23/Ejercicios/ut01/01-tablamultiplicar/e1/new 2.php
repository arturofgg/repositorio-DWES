<?php
$msg = "Hola soy PHP";
$cosa = 5;
$num = 5;
$hasta = 11;
$num2 = 10;
?>
<html>
    <head>
        
        <title>hola</title>
    </head>
    <body>
        
        
        <?php for($i=1; $i-1<$cosa; $i++) {?>
        <h1>Hola esto es un bucle <?php echo  $i . " de " . $cosa  ?></h1>
         <?php }?>
       
       
        <table>
            <tr>
                <td colspan=2>Multiplica</td>
            </tr>
             <?php for($i=0; $i<$hasta; $i++) {?>
            <tr>
                <td>
                     <?php echo $num . "x" . $i  ?> 
                </td>
                <td>
                     <?php echo $num*$i ?> 
                </td>
            </tr>
            <?php }?>
        </table>
        

         <table>
            <?php for($j=0; $j<10; $j++) {?>
            <tr>
                <?php for($i=0; $i<10; $i++) {?>
                <td
                     <?php echo $num3  ?> 
                     <?php $num2=$i  ?> 
                </td>
                <?php }?>
            </tr>
            <?php }?>
        </table>
    
    
    </body>
    
</html>