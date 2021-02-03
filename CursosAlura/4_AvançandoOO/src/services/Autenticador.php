<?php

namespace alura\banco\services;

require 'autoload.php';

use alura\banco\interfaces\IAutenticavel;

class Autenticador {

    public function tentaLogin(IAutenticavel $autenticavel, string $senha): bool {
        return $autenticavel->podeAutenticar($senha);
    }

}