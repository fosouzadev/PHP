<?php

namespace alura\banco;

require 'autoload.php';

use alura\banco\models\conta\{ContaCorrente, Titular};
use alura\banco\models\{Cpf, Endereco};
use alura\banco\util\Functions;

$cc = new ContaCorrente(
    new Titular(
        new Cpf("111"),
        'fulano',
        new Endereco('sao paulo', 'sant', 'rua teste', '12')
    )
);

$cc->depositar(600);
Functions::imprimeConta($cc);

$cc->sacar(50);
Functions::imprimeConta($cc);