<?php

namespace alura\banco;

require 'autoload.php';

use alura\banco\models\funcionario\{Diretor, Gerente};
use alura\banco\models\conta\Titular;
use alura\banco\models\{Cpf, Endereco};
use alura\banco\services\Autenticador;

$diretor = new Diretor('Noemi', new Cpf('1'), 15000);
$gerente = new Gerente('Pedro', new Cpf('2'), 6000);
$titular = new Titular(new Cpf('3'), 'Mara', new Endereco('sao paulo', 'teste', 'teste', '123'));

$auth = new Autenticador();

$diretorAuth = $auth->tentaLogin($diretor, '1234');
$gerenteAuth = $auth->tentaLogin($gerente, '1234');
$titularAuth = $auth->tentaLogin($titular, '1234');

echo "diretor: $diretorAuth \ngerente: $gerenteAuth \ntitular: $titularAuth" . PHP_EOL;