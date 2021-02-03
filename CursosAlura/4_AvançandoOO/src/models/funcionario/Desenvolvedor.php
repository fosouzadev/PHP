<?php

namespace alura\banco\models\funcionario;

require 'autoload.php';

class Desenvolvedor extends Funcionario {
    
    public function calculaBonificacao() : float {
        return 500;
    }
}