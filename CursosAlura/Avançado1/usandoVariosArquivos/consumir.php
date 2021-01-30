<?php

# caso o arquivo não seja localizado o programa continua tentando executar
//include 'recursos.php';

# caso o arquivo não seja localizado o programa para a execução no require
require 'recursos.php';

# importa somente uma vez caso o arquivo seja referenciado mais de uma vez
//require_once 'recursos.php';
//require_once 'recursos.php';

// echo descricao; não encontra variaveis em outros arquivos
echo Sum(1, 4);