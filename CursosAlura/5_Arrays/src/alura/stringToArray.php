<?php

namespace alura;

require '../../autoload.php';

use alura\Imprimir;

$nomes = "Noe, Adao, Eva";

// converter em array
$array = explode(', ', $nomes);
$string = implode(', ', $array);

Imprimir::EchoArray($array);
Imprimir::EchoString($string);