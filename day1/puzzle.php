<?php

$input = file('./input.txt');
$elvesCalories = array();
$elvesCounter = 0;
foreach ($input as $value) {
    if($value != "\n" && !array_key_exists($elvesCounter,$elvesCalories)){
        $elvesCalories[$elvesCounter] = $value;
    }
    elseif ($value != "\n" && array_key_exists($elvesCounter,$elvesCalories)) {
        $elvesCalories[$elvesCounter] += $value;
    }
    else{
        $elvesCounter ++;
    }
}
echo("El mayor número de calorías es: ".max($elvesCalories)."\n");
rsort($elvesCalories);
$sumTopThree = $elvesCalories[0] + $elvesCalories[1] + $elvesCalories[2];
echo("El total de calorías resultante de sumar las tres mayores cantidades es: ".$sumTopThree."\n");
