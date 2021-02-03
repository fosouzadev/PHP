<?php

namespace alura\banco;

require 'autoload.php';

use alura\banco\models\funcionario\{Desenvolvedor, Funcionario, Gerente, Diretor, EditorVideo};
use alura\banco\models\Cpf;
use alura\banco\services\Bonificacoes;

$bonificacoes = new Bonificacoes();

$func1 = new Desenvolvedor('Saulo', new Cpf('1'), 2000);
$func2 = new Gerente('paulo', new Cpf('2'), 5000);
$func3 = new Diretor('Cesar', new Cpf('3'), 6000);
$func4 = new EditorVideo('Silas', new Cpf('4'), 5000);

$bonificacoes->calculaTotalBonificacoes($func1);
$bonificacoes->calculaTotalBonificacoes($func2);
$bonificacoes->calculaTotalBonificacoes($func3);
$bonificacoes->calculaTotalBonificacoes($func4);

echo $bonificacoes->obterTotal() . PHP_EOL;