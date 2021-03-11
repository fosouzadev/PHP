<?php

$array = [1 , 2, 3];
$arrayAssoc = [
    'a' => 1,
    'b' => 2
];

class Teste { }
$obj = new Teste();

# saber o tipo
echo gettype($array) . PHP_EOL;
echo gettype($arrayAssoc) . PHP_EOL;
echo gettype($obj) . PHP_EOL;

# verificar tipo
if (is_array($array)) {
    echo 'é array' . PHP_EOL;
}

if (is_object($obj)) {
    echo 'é objeto' . PHP_EOL;
}