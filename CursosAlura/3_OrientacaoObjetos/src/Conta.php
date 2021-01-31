<?php

class Conta {
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
        Conta::$quantidadeContas++;
    }

    # destructor, chamdo sempre que o garbage collector limpa objeto
    public function __destruct()
    {
        self::$quantidadeContas--;
        echo 'destruindo objeto' . PHP_EOL;
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
            $this->saldo -= $valorSaque;
            return true;
        }

        return false;
    }

    public function depositar(float $valorDeposito) : bool {
        if ($valorDeposito > 0) {
            $this->saldo += $valorDeposito;
            return true;
        }

        return false;
    }

    public function transferir(float $valorTransferencia, Conta $contaDestino) : bool {
        $saqueOk = $this->sacar($valorTransferencia);
        $depositoOk = $contaDestino->depositar($valorTransferencia);

        return $saqueOk && $depositoOk;
    }
}