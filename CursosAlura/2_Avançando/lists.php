<?php

$contas = [
    [ 'titular' => 'Saulo', 'saldo' => 1000 ],
    [ 'titular' => 'Jose', 'saldo' => 2000 ],
    [ 'titular' => 'Pedro', 'saldo' => 1500 ]
];

# desestruturar um array com list (indice numérico)
list($conta1, $conta2) = $contas;

# desestruturar um array com list, forma simplificada (indice numérico)
[$conta1, $conta2] = $contas;


echo "$conta1[titular] $conta1[saldo] \n";
echo "$conta2[titular] $conta2[saldo] \n";


# desestruturar um array associativo com list
list('titular' => $titular1, 'saldo' => $saldo1) = $conta1;

# desestruturar um array associativo com list, forma simplificada
['titular' => $titular1, 'saldo' => $saldo1] = $conta1;

echo "$titular1 $saldo1 \n";