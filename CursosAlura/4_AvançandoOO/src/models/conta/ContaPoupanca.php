<?php

namespace alura\banco\models\conta;

require 'autoload.php';

use alura\banco\models\conta\ContaBase;

class ContaPoupanca extends ContaBase {

    protected function obterTarifa() : float {
        return 0.03;
    }

}