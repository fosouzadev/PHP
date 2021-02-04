<?php

namespace alura;

require '../../autoload.php';

use alura\{ArrayUtil, Imprimir};

$notas = [9, 3, 10, 5, 10];
echo 'Qtde notas: ' . sizeof($notas) . ' Qtde notas: ' . count($notas) . PHP_EOL;

echo "\nordenar crescente\n";
$notas = [9, 3, 10, 5, 10];
ArrayUtil::OrdenarAsc($notas);
Imprimir::EchoArray($notas);

echo "\nexcluir item existente\n";
$notas = [9, 3, 10, 5, 10];
ArrayUtil::ExcluirItem(10, $notas);
Imprimir::EchoArray($notas);

echo "\nexcluir item inexistente\n";
$notas = [9, 3, 10, 5, 10];
ArrayUtil::ExcluirItem(2, $notas);
Imprimir::EchoArray($notas);

echo "\nitens que estão em um array e não estão no outro\n";
$dados1 = [1, 2, 3, 4, 5];
$dados2 = [1, 3, 5];
$diff = ArrayUtil::Diferenca($dados1, $dados2);
Imprimir::EchoArray($diff);

echo "\nunir arrays\n";
$dados1 = [1, 2, 3, 4, 5];
$dados2 = [1, 3, 5];
$diff = ArrayUtil::Unir($dados1, $dados2);
Imprimir::EchoArray($diff);

echo "\ncombinar arrays em um array associativo\n";
$dados1 = ['a', 'b', 'c'];
$dados2 = [1111, 3333, 5555];
$diff = ArrayUtil::Combine($dados1, $dados2);
Imprimir::EchoArray($diff);

echo "\nverificar se existe uma chave em um array associativo\n";
if (ArrayUtil::ExisteChave('d', $diff))
    echo "chave d existe \n";
else 
    echo "chave d não existe \n";

if (ArrayUtil::ExisteChave('b', $diff))
    echo "chave b existe \n";
else 
    echo "chave b não existe \n";
