<?php

namespace alura\banco\models\conta;

require 'autoload.php';

use alura\banco\models\conta\ContaBase;

class ContaCorrente extends ContaBase {

    protected function ObterTarifa(): float {
        return 0.05;
    }

    public function transferir(float $valorTransferencia, ContaBase $contaDestino) : bool {
        $saqueOk = $this->sacar($valorTransferencia);
        $depositoOk = $contaDestino->depositar($valorTransferencia);

        return $saqueOk && $depositoOk;
    }

}