<?php

$varString = "felipe";
$varChar = 'f';
$varInteger = 13;
$varDouble = 13.54;
$varBool = true;

echo $varString . " " . gettype($varString) . "\n";
echo $varChar . " " . gettype($varChar) . "\n"; 
echo $varInteger . " " . gettype($varInteger) . "\n";
echo $varDouble . " " . gettype($varDouble) . "\n";
echo $varBool . " " . gettype($varBool) . "\n";

# permite trocar o tipo da variavel
$varInteger = "13";
echo $varInteger . " " . gettype($varInteger) . "\n";