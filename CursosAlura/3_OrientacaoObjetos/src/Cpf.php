<?php

class Cpf {

    private string $cpf;

    public function __construct(string $cpf) {
        $this->validaCpf($cpf);
        $this->cpf = $cpf;
    }

    public function obterCpf() {
        return $this->cpf;
    }

    private function validaCpf(string $cpf) {
        //exit();
    }
}