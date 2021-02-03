<?php

namespace alura\banco;

require 'autoload.php';

use alura\banco\models\Endereco;

$end1 = new Endereco('sao paulo', 'vila silva', 'rua do ó', '243');
$end2 = new Endereco('sao paulo', 'vila silva', 'rua do ó', '243');

// podemos concatenar objetos com string, porque agora implementam o método mágico __toString()
echo $end1 . PHP_EOL . $end2 . PHP_EOL;

// utilizando método mágico __get
echo "{$end1->rua} {$end1->numero} \n";

// utilizando método mágico __set
$end1->numero = '111';
echo $end1 . PHP_EOL;