<?php

function f1() : void {
    echo 'Entrei f1' . PHP_EOL;

    try {
        // exception 
        // $arrayFixo = new SplFixedArray(2);
        // $arrayFixo[2] = 'valor';

        // error
        $divisao = intdiv(5, 0);
    } catch (RuntimeException | DivisionByZeroError $ex) {
        echo "Erro tratado em f1: {$ex->getMessage()}" . PHP_EOL;
    }
    // catch (DivisionByZeroError $ex2) {
    //     echo "Erro tratado em f1: {$ex2->getMessage()}" . PHP_EOL;
    // }

    f2();
    echo 'Saindo f1' . PHP_EOL;
}

function f2() : void {
    echo 'Entrei f2' . PHP_EOL;

    for ($i = 1; $i <= 5; $i++)
        echo "$i ";

    echo PHP_EOL . 'Saindo f2' . PHP_EOL;
}

echo 'Entrei main' . PHP_EOL;
f1();
echo 'Saindo main' . PHP_EOL;