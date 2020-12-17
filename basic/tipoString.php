<?php

    # apas simples : não interpolam variaveis ou caracteres de escape
    echo 'isto é uma string com aspas simples \t\n';

    # apas duplas : interpolam variáveis e caracteres de escape
    echo "\nisto é uma string \t com aspas duplas";

    # heredoc : 
    // interpolam variáveis e caracteres de escape
    // não identicar o corpo da string e nem o EOT; de fechamento
    $heredoc = <<<EOT
\nisto é uma string \t com heredoc \n
EOT;
    echo $heredoc;

    # nowdoc : 
    // não interpolam variaveis ou caracteres de escape
    // item de abertura precisa estar em aspas simples
    // não identicar o corpo da string e nem o EOD; de fechamento
    $nowdoc = <<<'EOD'
\nisto é uma string \t com nowdoc
EOD;
    echo $nowdoc;

    # interpolar valores
    $var1 = 'abc';
    echo "\nteste heredoc : ${var1} - $var1 \n";

    # indices positivos e negativos
    echo "$var1[0] $var1[1] $var1[2] \n";
    echo "$var1[-1] $var1[-2] $var1[-3]";