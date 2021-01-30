<?php

$contas = [
    [ 'titular' => 'Saulo', 'saldo' => 1000 ],
    [ 'titular' => 'Jose', 'saldo' => 2000 ]
];

function sacar(array &$conta, float $valorSaque) {
    if ($valorSaque > 0 && $valorSaque <= $conta['saldo'])
        $conta['saldo'] -= $valorSaque;
}

function depositar(&$conta, $valorDeposito) {
    if ($valorDeposito > 0)
        $conta['saldo'] += $valorDeposito;
}

echo $contas[0]['titular'] . " " . $contas[0]['saldo'] . PHP_EOL;

sacar($contas[0], 300);
echo $contas[0]['titular'] . " " . $contas[0]['saldo'] . PHP_EOL;

depositar($contas[0], 150);
echo $contas[0]['titular'] . " " . $contas[0]['saldo'] . PHP_EOL;