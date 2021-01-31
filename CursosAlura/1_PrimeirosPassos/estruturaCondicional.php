<?php

$idade = 18;
$nome = 'fulano';
$ativo = true;

if ($idade >= 18)
    echo 'Ok, pode entrar';
else
    echo 'Acesso restrito';

echo PHP_EOL;

# php permite utilizar para o operador 'ou' || e or
# php permite utilizar para o operador 'and' && e and
if ($idade > 18 or $idade == 18)
    echo 'Ok, pode entrar';
else
    echo 'Acesso restrito';

if ($idade >= 18 && $nome == 'fulano' and $ativo)
    echo "\nTudo ok";

if ($idade)
    echo "\nOk, pode entrar\n";

# operador ternário
echo $idade >= 18 ? 'Ok, pode entrar' : 'Acesso restrito';