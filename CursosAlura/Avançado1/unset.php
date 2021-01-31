<?php

$numeros = [1, 2, 3, 4, 5];

$pessoa = [
    'nome' => 'Adao',
    'idade' => 903,
    'sexo' => 'M'
];

$indicador = 50;

foreach ($numeros as $n)
    echo "$n \n";

foreach ($pessoa as $p)
    echo "$p \n";

echo "$indicador \n";

echo " \n excluir com unset \n";

unset($numeros[2]); // exclui indice 2
unset($pessoa['idade']); // exclui idade
unset($indicador); // exclui variavel

foreach ($numeros as $n)
    echo "$n \n";

foreach ($pessoa as $p)
    echo "$p \n";

echo "$indicador \n";