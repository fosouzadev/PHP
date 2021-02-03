<?php

# sem parametro, sem retorno
function helloWorld() {
    echo 'hello world!' . PHP_EOL;
}

# sem parametro, com retorno
function helloWorld2() {
    return 'hello world!' . PHP_EOL;
}

# com parametro, sem retorno
function helloWorld3($msg) {
    echo $msg . PHP_EOL;
}

# com parametro, com retorno
function helloWorld4($msg) {
    return $msg . PHP_EOL;
}

# parametros e retorno tipados
function helloWorldType(string $msg, float $value) : float {
    echo "$msg $value" . PHP_EOL;
    return 0;
}
function helloWorldType2(string $msg, float $value) : void {
    echo "$msg $value" . PHP_EOL;
}

# parametro e retorno tipado ou null
function helloWorldTypeNull(?float $numero) : ?float {
    if ($numero !== null)
        return $numero * 2;
    
    return $numero;
}


helloWorld();
echo helloWorld2();
helloWorld3('hello world!');
echo helloWorld4('hello world!');
helloWorldType('hello world', 2021);
helloWorldType(true, 2021);
echo helloWorldTypeNull(5);
echo helloWorldTypeNull(null);