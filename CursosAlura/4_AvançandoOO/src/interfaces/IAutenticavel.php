<?php

namespace alura\banco\interfaces;

require 'autoload.php';

interface IAutenticavel {

    public function podeAutenticar(string $senha) : bool;

}