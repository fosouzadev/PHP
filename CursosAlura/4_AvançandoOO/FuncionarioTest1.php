<?php

namespace alura\banco;

require_once 'autoload.php';

use alura\banco\models\{ Funcionario, Cpf };

$func1 = new Funcionario('Paulo', new Cpf('222'), 'Analista');
$func2 = new Funcionario('Sarai', new Cpf('333'), 'Atendimento');


util\imprimeFuncionario($func1);
util\imprimeFuncionario($func2);