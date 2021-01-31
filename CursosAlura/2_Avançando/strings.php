<?php

$email = "fadfsdafs";

$posicao = strpos($email, "@");

echo $posicao . " " . gettype($posicao) . "\n";

if ($posicao === 0) 
    echo "informe a conta \n";

if (!$posicao)
    echo "informe o @ \n";