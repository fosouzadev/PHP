<?php

namespace alura\banco\models\funcionario;

require 'autoload.php';

class EditorVideo extends Funcionario {
    
    public function calculaBonificacao() : float {
        return 600;
    }
}