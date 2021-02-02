<?php

namespace alura\banco\models\funcionario;

require 'autoload.php';

use alura\banco\models\{Pessoa, Cpf};

class Funcionario extends Pessoa {
    private string $cargo;
    private float $salario;

    public function __construct(string $nome, Cpf $cpf, string $cargo, float $salario) {
        parent::__construct($nome, $cpf);

        $this->cargo = $cargo;
        $this->salario = $salario;
    }

    public function ObterCargo() {
        return $this->cargo;
    }

    public function obterSalario() {
        return $this->salario;
    }

    public function definirNome(string $nome) {
        $this->validaNome($nome);
        $this->nome = $nome;
    }

    public function calculaBonificacao() : float {
        return $this->salario * 0.1;
    }
}