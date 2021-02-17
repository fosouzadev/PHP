<?php

namespace alura;

$numeros = [1, 2, 3, 4, 5];
$mult = 2;

$res = array_map(function ($item) use ($mult) {
    return $item * $mult;
}, $numeros);

var_dump($res);

// quando função anonima tem somente uma linha e retorna o valor da expressão
// podemos usar a notação simplificada

$res2 = array_map(fn ($item) => $item * $mult, $numeros);

var_dump($res2);