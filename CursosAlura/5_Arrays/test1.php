<?php

$notas = [9, 3, 10, 5, 10];

echo 'Qtde notas: ' . sizeof($notas) . ' ' . count($notas) . PHP_EOL;

$soma = 0;
foreach ($notas as $i => $nota) {
    echo "$i -> $nota \n";
    $soma += $nota;
}

$media = $soma / count($notas);
echo "Media: $media \n";