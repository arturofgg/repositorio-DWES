<?php
/*
    Función: array_rand

    array_rand(array $array, int $num = 1): mixed
    array: El array de entrada.
    num: Especifica cuántas entradas deberían seleccionarse.
    
    Dados dos arrays unidimensionales, uno de tareas[] y otro de personas[], asigna de manera aleatoria una tarea a cada persona. Si ya le echas valor, crea un arraybidimensional de tareas_diarias[dia][tarea] y haz un organigrama donde asignes tareas a cada persona durante la semana
*/
?>

<?php
$tareas = [
    'Pelar mandarinas a Gru',
    'Comer comida a Gru',
    'Beber bebida a Gru',
    'Recoger título a Gru',
    'Cobrar salario a Gru',
    'Barrer casa a Gru',
    'Fregar casa a Gru',
    'Chupar hielos a Gru',
    'Darle un masaje a Gru',
    'Darle un baño a Gru',
    'Asear los dientes a Gru',
    'Cortarle el pelo a Gru'
];
  $minions = [
    'Oto',
    'Gah',
    'Bru'
  ];
for($i=0;$i<count($personas);$i++){
    $repar_tareas=array_rand($tareas,1);
    echo($personas[$i] . " tiene que " . $tareas[$repar_tareas]."\n");
    
}
?>