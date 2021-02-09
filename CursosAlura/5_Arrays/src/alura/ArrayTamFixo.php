<?php

namespace alura;

use SplFixedArray;

// não permite aumentar o tamanho do array adicionando novos itens
$numeros = new SplFixedArray(2);

$numeros[0] = 10;
$numeros[1] = 20;

// unset($numeros[0]); permite
// $numeros[2] = 30;  não permite

echo "{$numeros[0]} {$numeros[1]}";