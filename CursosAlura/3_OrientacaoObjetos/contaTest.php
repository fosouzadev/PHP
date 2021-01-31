<?php

require 'src/Conta.php';
require 'src/titular.php';

function imprimeConta(Conta $conta) : void {
    echo "{$conta->obterTitular()->obterCpf()} {$conta->obterTitular()->obterNome()} {$conta->obterSaldo()} \n";
}

//$conta0 = new Conta('000', 'Ana'); // validar método private

$conta1 = new Conta(new Titular(new Cpf('12345679812'), 'Silas'));
$conta1 -> depositar(1000);

imprimeConta($conta1);

$conta1->sacar(420);
imprimeConta($conta1);

$conta1->depositar(420);
imprimeConta($conta1);

$conta2 = new Conta(new Titular(new Cpf('32156478945'), 'Jose'));
$conta2->depositar(560);

echo "\n transferencia \n";
imprimeConta($conta1);
imprimeConta($conta2);

$conta1->transferir(100, $conta2);
imprimeConta($conta1);
imprimeConta($conta2);

echo "\n método estático \n";
echo "Contas: " . Conta::obterQuantidadeContas() . "\n";

$contaAux = $conta2;
unset($conta2); // destroi a referencia, o objeto é destruido somente pelo GC

imprimeConta($contaAux);
echo "Contas: " . Conta::obterQuantidadeContas() . "\n";