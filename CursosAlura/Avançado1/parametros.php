<?php

$numero = 1;
$array = ['a', 'b'];

echo "passagem de parametro por valor \n";

function somaUm($num) {
    $num++;
}
somaUm($numero);
echo $numero . PHP_EOL;

function imprimeArray($var) {
    foreach ($var as $i => $v)
        echo "$i $v" . PHP_EOL;
    
    $var[0] = 'c';
}
imprimeArray($array);
imprimeArray($array);


echo "passagem de parametro por referencia \n";

function somaUm2(&$num) {
    $num++;
}
somaUm2($numero);
echo $numero . PHP_EOL;

function imprimeArray2(&$var) {
    foreach ($var as $i => $v)
        echo "$i $v" . PHP_EOL;
    
    $var[0] = 'c';
}
imprimeArray2($array);
imprimeArray2($array);