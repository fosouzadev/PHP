<?php

    # bool
    /*
    é considerado false:
        * false
        * 0 e -0
        * 0.0 e -0.0
        * string vazia e "0"
        * array sem elementos
        * tipo especial NULL
        * objetos SimpleXML criados a partir de tags vazias
    */
    $varBool = true;

    # int
    $varInt = 13;

    # float / double
    $varFloat = 13.55;

    # string
    $varString = 'felipe';


    # saber o tipo
    echo gettype($varBool) . PHP_EOL;
    echo gettype($varInt) . PHP_EOL;
    echo gettype($varFloat) . PHP_EOL;
    echo gettype($varString) . PHP_EOL;

    # verificar tipo
    if (is_bool($varBool)) {
        echo 'é bool' . PHP_EOL;
    }
    
    if (is_int($varInt)) {
        echo 'é inteiro' . PHP_EOL;
    }

    if (is_float($varFloat)) {
        echo 'é float/double' . PHP_EOL;
    }

    if (is_string($varString)) {
        echo 'é string' . PHP_EOL;
    }