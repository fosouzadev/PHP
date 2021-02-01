<?php

namespace alura\banco;

require 'autoload.php';

use alura\banco\models\conta\{ Conta, Titular };
use alura\banco\models\{ Endereco, Cpf };

$endereco = new Endereco('São Paulo', 'Vila Teste', 'Rua Abc', '123');

$conta1 = new Conta(new Titular(new Cpf('111'), 'Jose', $endereco));

$conta2 = new Conta(new Titular(new Cpf('111'), 'Maria', $endereco));


util\imprimeConta($conta1);
util\imprimeConta($conta2);