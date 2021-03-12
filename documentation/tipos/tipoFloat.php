<?php

# comparação de tipos float, com margem de erro

$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;

if(abs($a-$b) < $epsilon) {
    echo "iguais";
}