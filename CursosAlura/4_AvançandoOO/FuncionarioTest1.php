<?php

namespace alura\banco;

require 'autoload.php';

use alura\banco\models\{ Cpf };
use alura\banco\models\funcionario\Funcionario;
use alura\banco\util\Functions;

// não permite instanciar porque é uma classe abstrata
$func1 = new Funcionario('Paulo', new Cpf('222'), 'Analista');
$func2 = new Funcionario('Sarai', new Cpf('333'), 'Atendimento');


Functions::imprimeFuncionario($func1);
Functions::imprimeFuncionario($func2);