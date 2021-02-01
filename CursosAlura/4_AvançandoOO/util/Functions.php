<?php

namespace alura\banco\util;

require 'autoload.php';

use alura\banco\models\conta\Conta;
use alura\banco\models\Funcionario;

function imprimeConta(Conta $conta) {
    echo $conta->obterTitular()->obterNome() . ' ' .
         $conta->obterTitular()->obterCpf()->obterNumero() . ' ' .
         $conta->obterSaldo() . PHP_EOL;
}

function imprimeFuncionario(Funcionario $funcionario) {
    echo $funcionario->obterNome() . ' ' .
         $funcionario->obterCpf()->obterNumero() . ' ' .
         $funcionario->ObterCargo() . PHP_EOL;
}