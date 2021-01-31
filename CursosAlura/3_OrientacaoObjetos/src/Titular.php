<?php

require 'Cpf.php';

class Titular {
    private Cpf $cpf;
    private string $nome;

    public function __construct(Cpf $cpf, string $nome) {
        $this->cpf = $cpf;

        $this->validaTitular($nome);
        $this->nome = $nome;
    }

    public function obterCpf() {
        return $this->cpf;    
    }

    public function obterNome() {
        return $this->nome;
    }

    # métodos private
    private function validaTitular(string $titular) {
        if (mb_strlen($titular) < 4) {
            echo 'titular inválido';
            exit();
        }
    }
}