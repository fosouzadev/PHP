<?php

namespace alura\banco\models\conta;

require 'autoload.php';

use alura\banco\models\{ Pessoa, Endereco, Cpf};

class Titular extends Pessoa {
    private Endereco $endereco;

    public function __construct(Cpf $cpf, string $nome, Endereco $endereco) {
        parent::__construct($nome, $cpf);        
        
        $this->endereco = $endereco;
    }

    public function obterEndereco() {
        return $this->endereco;
    }
}