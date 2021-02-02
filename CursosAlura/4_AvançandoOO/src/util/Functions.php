<?php

namespace alura\banco\util;

require 'autoload.php';

use alura\banco\models\conta\ContaBase;
use alura\banco\models\Funcionario;

class Functions {

    public static function imprimeConta(ContaBase $conta) {
        echo $conta->obterTitular()->obterNome() . ' ' .
             $conta->obterTitular()->obterCpf()->obterNumero() . ' ' .
             $conta->obterSaldo() . PHP_EOL;
    }

    public static function imprimeFuncionario(Funcionario $funcionario) {
        echo $funcionario->obterNome() . ' ' .
             $funcionario->obterCpf()->obterNumero() . ' ' .
             $funcionario->ObterCargo() . PHP_EOL;
    }

}