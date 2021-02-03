<?php

namespace alura\banco\services;

require 'autoload.php';

use alura\banco\models\funcionario\Funcionario;

class Bonificacoes {

    private float $totalBonificacoes = 0;

    public function calculaTotalBonificacoes(Funcionario $funcionario) {

        $this->totalBonificacoes += $funcionario->calculaBonificacao();

    }

    public function obterTotal() {
        return $this->totalBonificacoes;
    }

}