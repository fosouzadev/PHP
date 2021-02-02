<?php

namespace alura\banco\models\conta;

require 'autoload.php';

use Alura\banco\models\conta\Titular;

abstract class ContaBase {
    # atributos
    private Titular $titular;
    private float $saldo;

    # estático
    private static int $quantidadeContas = 0;

    public static function obterQuantidadeContas() : int {
        // acessar usando Conta ou self
        return self::$quantidadeContas;
    }

    # construtor
    public function __construct(Titular $titular) {
        $this->titular = $titular;
        $this->saldo = 0;

        // acessar usando Conta ou self
        ContaBase::$quantidadeContas++;
    }

    # destructor, chamdo sempre que o garbage collector limpa objeto
    public function __destruct()
    {
        self::$quantidadeContas--;
    }

    # getters and setters
    public function obterTitular() : Titular {
        return $this->titular;
    }

    public function obterSaldo() : float {  
        return $this->saldo;
    }    

    # métodos
    public function sacar(float $valorSaque) : bool {
        if ($valorSaque > 0 && $valorSaque <= $this->saldo) {
            $valorSaque += $valorSaque * $this->ObterTarifa();
            $this->saldo -= $valorSaque;
            return true;
        }

        return false;
    }

    protected abstract function ObterTarifa() : float;

    public function depositar(float $valorDeposito) : bool {
        if ($valorDeposito > 0) {
            $this->saldo += $valorDeposito;
            return true;
        }

        return false;
    }
}