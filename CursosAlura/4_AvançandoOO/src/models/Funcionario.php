<?php

namespace alura\banco\models;

require 'autoload.php';

use alura\banco\models\Pessoa;

class Funcionario extends Pessoa {
    private string $cargo;

    public function __construct(string $nome, Cpf $cpf, string $cargo) {
        parent::__construct($nome, $cpf);

        $this->cargo = $cargo;
    }

    public function ObterCargo() {
        return $this->cargo;
    }

    public function definirNome(string $nome) {
        $this->validaNome($nome);
        $this->nome = $nome;
    }
}