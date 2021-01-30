<?php

# permite associar um indice personalizado, ao invés do numérico
echo 'array associativo' . PHP_EOL;
$conta1 = [
    'titular' => 'Vinicies',
    'saldo' => 1000
];

# adicionar item ao array em indice inexistente
$conta1['ativa'] = 'sim';

# caso não informe o indice, é adicionado no final, nesse caso como zero (0)
$conta1[] = 'ok';

foreach ($conta1 as $ind => $ct)
    echo "$ind $ct \n";


# array de array associativo definindo indice numérico
echo PHP_EOL . 'array associativo com indice numerico personalizado' . PHP_EOL;
$contas = [
    555 => [ 'titular' => 'Saulo', 'saldo' => 1000 ],
    333 => [ 'titular' => 'Jose', 'saldo' => 2000 ]
];

# adicionar item sem informar indice, o php gera um novo número a partir do maior número
$contas[] = [ 'titular' => 'Maria', 'saldo' => 5000 ];

foreach ($contas as $ind => $ct)
    echo $ind . " " . $ct['titular'] . "\n";


# podemos criar um array de arrays associativos
echo PHP_EOL . 'array de array associativo' . PHP_EOL;
$contas = [
    [ 'titular' => 'Saulo', 'saldo' => 1000 ],
    [ 'titular' => 'Jose', 'saldo' => 2000 ]
];

# adicionar item ao array em indice inexistente
$contas[2] = $conta1;

# caso não informe o indice, é adicionado no final
$contas[] = $conta1;

for ($i = 0; $i < count($contas); $i++) {
    echo "{$contas[$i]['titular']} {$contas[$i]['saldo']} " . PHP_EOL;
}