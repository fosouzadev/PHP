<?php

namespace alura\banco\models;

require 'autoload.php';

use alura\banco\traits\AcessoAtributos;

// classe final não pode ser herdada
final class Endereco {
    private string $cidade;
    private string $bairro;
    private string $rua;
    private string $numero;

    public function __construct(
        string $cidade,
        string $bairro,
        string $rua,
        string $numero)
    {
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
    }

    public function __toString() : string
    {
        return $this->obterRua() . ' ' . $this->obterNumero() . ' '
             . $this->obterBairro() . ' ' . $this->obterCidade();
    }

    public function obterCidade() {
        return $this->cidade;
    }

    public function obterBairro() {
        return $this->bairro;
    }

    public function obterRua() {
        return $this->rua;
    }

    public function obterNumero() {
        return $this->numero;
    }

    public function definirNumero(string $numero) {
        $this->numero = $numero;
    }

    // injetamos esses métodos usando Trait
    use AcessoAtributos;

    // public function __get(string $nomeAtributo)
    // {
    //     $nomeMetodo = 'obter' . ucfirst($nomeAtributo);
    //     return $this->$nomeMetodo();
    // }

    // public function __set($nomeAtributo, $valor)
    // {
    //     $nomeMetodo = 'definir' . ucfirst($nomeAtributo);
    //     $this->$nomeMetodo($valor);
    // }
}