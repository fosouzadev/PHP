<?php

namespace alura\banco\models\funcionario;

require 'autoload.php';


class Diretor extends Funcionario {

    public function calculaBonificacao() : float {
        return $this->obterSalario() * 2;
    }

}