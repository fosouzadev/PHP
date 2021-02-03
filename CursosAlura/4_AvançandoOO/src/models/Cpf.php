<?php

namespace alura\banco\models;

// classe final não pode ser herdada
final class Cpf {

    private string $cpf;

    public function __construct(string $cpf) {
        $this->validaCpf($cpf);
        $this->cpf = $cpf;
    }

    public function obterNumero() {
        return $this->cpf;
    }

    private function validaCpf(string $cpf) {
        //exit();
    }
}