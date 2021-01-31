<?php

$contas = [
    [ 'titular' => 'Saulo', 'saldo' => 1000 ],
    [ 'titular' => 'Jose', 'saldo' => 2000 ]
];

echo 'for' . PHP_EOL;
for ($i = 0; $i < count($contas); $i++)
    echo $contas[$i]['titular'] . " " . $contas[$i]['saldo'] . PHP_EOL;

echo "\nwhile" . PHP_EOL;
$i = 0;
while ($i < count($contas)) {
    echo $contas[$i]['titular'] . " " . $contas[$i]['saldo'] . PHP_EOL;
    ++$i;
}

echo "\ndo while" . PHP_EOL;
$i = 0;
do {
    echo $contas[$i]['titular'] . " " . $contas[$i]['saldo'] . PHP_EOL;
    ++$i;
} while($i < count($contas));

echo "\nforeach" . PHP_EOL;
foreach ($contas as $ct)
    echo $ct['titular'] . " " . $ct['saldo'] . PHP_EOL;

echo "\nforeach com indice" . PHP_EOL;
foreach ($contas as $ind => $ct)
    echo $ind . " " . $ct['titular'] . " " . $ct['saldo'] . PHP_EOL;