<?php

namespace alura\banco;

require 'autoload.php';

use alura\banco\models\funcionario\{Funcionario, Gerente, Diretor};
use alura\banco\models\Cpf;

$bonificacoes = new Bonificacoes();

$func1 = new Funcionario('Saulo', new Cpf('1'), 'porteiro', 2000);
$func2 = new Gerente('paulo', new Cpf('2'), 'marketing', 5000);
$func3 = new Diretor('Cesar', new Cpf('3'), 'global', 6000);

$bonificacoes->calculaTotalBonificacoes($func1); // 200
$bonificacoes->calculaTotalBonificacoes($func2); // 5000
$bonificacoes->calculaTotalBonificacoes($func3); // 12.000

echo $bonificacoes->obterTotal() . PHP_EOL;