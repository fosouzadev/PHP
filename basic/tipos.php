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
    echo gettype($varBool);
    echo gettype($varInt);
    echo gettype($varFloat);
    echo gettype($varString);