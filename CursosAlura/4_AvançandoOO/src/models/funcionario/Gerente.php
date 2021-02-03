<?php

namespace alura\banco\models\funcionario;

require 'autoload.php';

use alura\banco\interfaces\IAutenticavel;

class Gerente extends Funcionario implements IAutenticavel {

    public function calculaBonificacao() : float {
        return $this->obterSalario();
    }

    public function podeAutenticar(string $senha) : bool {
        return $senha === '1234';
    }

}