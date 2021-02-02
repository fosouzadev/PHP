<?php

namespace alura\banco;

require 'autoload.php';

use alura\banco\models\conta\{ ContaCorrente, ContaPoupanca, Titular };
use alura\banco\models\{ Endereco, Cpf };
use alura\banco\util\Functions;

$endereco = new Endereco('São Paulo', 'Vila Teste', 'Rua Abc', '123');

$conta1 = new ContaCorrente(new Titular(new Cpf('111'), 'Jose', $endereco));

$conta2 = new ContaPoupanca(new Titular(new Cpf('111'), 'Maria', $endereco));


Functions::imprimeConta($conta1);
Functions::imprimeConta($conta2);