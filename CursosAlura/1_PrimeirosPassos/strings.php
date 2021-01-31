<?php

$nome = "fulano";
$sobrenome = "da Silva";

# aspas simples não interpolam variaveis ou caracteres de escape
echo 'Olá, meu nome é $nome $sobrenome';

# aspas duplas interpolam variaveis e caracteres de escape
echo "\nOlá, meu nome é $nome ${sobrenome}";

# por padrão o php não quebra a linha, e podemos usar caracter de escape ou PHP_EOL que possui o mesmo comportamento
echo PHP_EOL . "Novo texto aqui";