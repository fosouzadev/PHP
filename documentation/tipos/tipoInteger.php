<?php

$a = 1234; // número decimal
$b = 0123; // número octal (equivalente a 83 em decimal)
$c = 0x1A; // número hexadecimal (equivalente a 26 em decimal)
$d = 0b11111111; // número binário (equivalente ao 255 decimal)
$e = 1_234_567; // decimal number (as of PHP 7.4.0)

echo $a . PHP_EOL;
echo $b . PHP_EOL;
echo $c . PHP_EOL;
echo $d . PHP_EOL;
echo $e . PHP_EOL;

echo PHP_INT_MIN . PHP_EOL;
echo PHP_INT_MAX . PHP_EOL;