<? php 
/*
1 Jorge (Profe)
Funciones: array_walk, array_map, array_filter, array_reduce

$personas = [
    ["Jorge", 1],
    ["Bea", 0],
    ["Paco", 1],
    ["Amparo", 0],
];

Utiliza alguna de las funciones para generar un array de cadenas indicando el nombre de la persona y cómo tratarle con formalidad. Si el valor entero detrás del nombre es un 1 Hay que poner "Señor <nombre>", si es 0 hay que poner "Señora <nombre>"

$resultado = ["Señor Jorge", "Señora Bea", "Señor Paco", "Señora Amparo"];

--

$comida = [

         0 => ["Banana", 3, 56],

    1 => ["Chuleta", 1, 256]

    2 => ["Pan", 1, 90]

    ]
    
Utiliza la función map_reduce para calcular la cantidad de calorías de la comida anterior.

--

Con el array de personas anterior, utiliza el array_filter para sacar un listado de Hombre y otro listado de mujeres.
*/
?>

<?php 
$personas= [
    ["Jorge", 1],
    ["Bea", 0],
    ["Paco", 1],
    ["Amparo", 0],
];

function mister($valor,$clave){
    
    if($valor[1]==0){
        echo "Sra " .$valor[0]."\n";
    }else echo "Sr " .$valor[0]."\n";
}

$presentacion=array_walk($personas, 'mister');

$comida = [
    0=>["Banana",3,56],
    1=>["Chuleta",1,256],
    2=>["Pan",1,90]
   ];
   
   function calTotales($acumulador,$array) {
       $acumulador += $array[1] * $array[2];
       return $acumulador;
   }
   
   echo(array_reduce($comida,"calTotales")); 

   $resultado = array_map(function($pep){
    return (($pep[1]== 1) ? "Señor ":"Señora "). $pep[0];
}
,$personas);

array_walk($resultado,function($sexo){
    echo "$sexo<br>";
}
);

echo "<br><br>";
echo "Hombres:\n";
$hombre = array_filter($personas,function($sexo){
    return  $sexo[1] == 1;
}
);
echo "<br>";
array_walk($hombre,function($sexo){
    echo "$sexo[0]<br>";
}
);

echo "<br>";
echo "Mujeres:\n";
$mujer = array_filter($personas,function($sexo){
    return  $sexo[1] == 0;
}
);
echo "<br>";
array_walk($mujer,function($sexo){
    echo "$sexo[0]<br>";
}
);