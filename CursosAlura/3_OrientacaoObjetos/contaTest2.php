<?php

require 'src/Conta.php';
require 'src/titular.php';

$conta1 = new Conta(new Titular(new Cpf('12345679812'), 'Silas'));
$conta1 -> depositar(1000);

$titular = $conta1->obterTitular();

$titular = new Titular(new Cpf('111'), 'fdafsfsaf');

echo $conta1->obterTitular()->obterNome() . PHP_EOL;
