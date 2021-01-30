<?php

# forma antiga de declarar array
$idades1 = array(21, 23, 19, 25, 30, 41, 18);

# forma atual de declarar array
$idades2 = [21, 23, 19, 25, 30, 41, 18];

echo 'count ' . count($idades1) . " ". count($idades2) . PHP_EOL;

# o indice 7 não existia e adicionei ao array
$idades1[7] = 99;

# caso não informe o indice, é adicionado no final
$idades1[] = 33;

foreach ($idades1 as $i => $value)
    echo "$i $value \n";