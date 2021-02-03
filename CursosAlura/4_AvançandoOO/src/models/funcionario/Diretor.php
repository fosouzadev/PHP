<?php

namespace alura\banco\models\funcionario;

require 'autoload.php';

use alura\banco\interfaces\IAutenticavel;

class Diretor extends Funcionario implements IAutenticavel {

    public function calculaBonificacao() : float {
        return $this->obterSalario() * 2;
    }

    public function podeAutenticar(string $senha) : bool {
        return $senha === '1234';
    }
}