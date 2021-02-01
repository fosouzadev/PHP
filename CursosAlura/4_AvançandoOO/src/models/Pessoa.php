<?php

namespace alura\banco\models;

require 'autoload.php';

use alura\banco\models\Cpf;

class Pessoa {
    protected string $nome;
    private Cpf $cpf;

    public function __construct(string $nome, Cpf $cpf)
    {
        $this->validaNome($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function obterNome() {
        return $this->nome;
    }

    public function obterCpf() {
        return $this->cpf;
    }

    protected function validaNome(string $nome) {
        if (mb_strlen($nome) < 4) {
            echo 'titular inválido';
            exit();
        }
    }
}