<?php

namespace alura\banco\models\funcionario;

require 'autoload.php';


class Gerente extends Funcionario {

    public function calculaBonificacao() : float {
        return $this->obterSalario();
    }

}