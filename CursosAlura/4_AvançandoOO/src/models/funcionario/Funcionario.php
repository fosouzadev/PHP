<?php

namespace alura\banco\models\funcionario;

require 'autoload.php';

use alura\banco\models\{Pessoa, Cpf};

abstract class Funcionario extends Pessoa {
    private float $salario;

    public function __construct(string $nome, Cpf $cpf, float $salario) {
        parent::__construct($nome, $cpf);

        $this->salario = $salario;
    }

    public function obterSalario() {
        return $this->salario;
    }

    // método final não pode ser sobrescrito em classes filhas
    final public function definirNome(string $nome) {
        $this->validaNome($nome);
        $this->nome = $nome;
    }

    public abstract function calculaBonificacao() : float;
}