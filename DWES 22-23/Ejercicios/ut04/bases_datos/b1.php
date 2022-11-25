<?php

print_r(PDO::getAvailableDrivers());

function pintarDatos()
{
    try {
        $mbd = new PDO('mysql:host=localhost;dbname=proyectoEventos', "arturo", "arturo12345");
        $stmt = $mbd->prepare("SELECT * FROM Ciclistas");
        $stmt->execute();
        $cosas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //RECORRE LOS CAMPOS QUE ELIJAS
?>
    <?php $a=0; ?>
        <table>
            <?php foreach ($cosas as $cliente) { $a++ ?>
                <tr>
                    <?= "<td> " . $cliente['id'] . "</td><td><a href='b1redirect.php'> " . $cliente['nombre'] . "</a></td><td> " . $cliente['num_trofeos'] . "</td>"; ?>
                </tr>
            <?php } ?>
        </table>
<?php

        /* RECORRE TODOS LOS CAMPOS SIN SALTARSE NINGUNO
    
        $acc = "";
        foreach ($cosas as $cliente) {
            foreach ($cliente as $campo) {
                $acc .= $campo . " ";
            }
            $acc .= "<br>";
        }
        echo $acc;
    
    */
        // Ya se ha terminado; se cierra
        $cosas = null;
        $mbd = null;
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>b1</title>
    <style>
        table, td , tr{
            border-collapse: collapse;
            border:  1px solid black;
        } 
        td{
            padding: 3px;
        }
    </style>
</head>
<body>
    <?php pintarDatos() ?>
</body>
</html>