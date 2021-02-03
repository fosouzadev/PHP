<?php

namespace alura\banco\models\conta;

require 'autoload.php';

use alura\banco\models\{ Pessoa, Endereco, Cpf};
use alura\banco\interfaces\IAutenticavel;

class Titular extends Pessoa implements IAutenticavel {
    private Endereco $endereco;

    public function __construct(Cpf $cpf, string $nome, Endereco $endereco) {
        parent::__construct($nome, $cpf);        
        
        $this->endereco = $endereco;
    }

    public function obterEndereco() {
        return $this->endereco;
    }

    public function podeAutenticar(string $senha) : bool {
        return $senha === '1234';
    }
}