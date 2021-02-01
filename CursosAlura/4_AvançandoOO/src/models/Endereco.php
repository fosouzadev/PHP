<?php

namespace alura\banco\models;

class Endereco {
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
}