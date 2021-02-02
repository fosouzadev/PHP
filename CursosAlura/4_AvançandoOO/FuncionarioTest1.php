<?php

namespace alura\banco;

require 'autoload.php';

use alura\banco\models\{ Funcionario, Cpf };
use alura\banco\util\Functions;

$func1 = new Funcionario('Paulo', new Cpf('222'), 'Analista');
$func2 = new Funcionario('Sarai', new Cpf('333'), 'Atendimento');


Functions::imprimeFuncionario($func1);
Functions::imprimeFuncionario($func2);