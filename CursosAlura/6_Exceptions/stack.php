<?php

function f1() : void {
    echo 'Entrei f1' . PHP_EOL;

    try {
        // exception 
        // $arrayFixo = new SplFixedArray(2);
        // $arrayFixo[2] = 'valor';

        // error
        $divisao = intdiv(5, 0);
    } 
    //catch (RuntimeException | DivisionByZeroError $ex) {  // exception e erro específico
    //catch (Throwable $ex) { // interface que captura todos os erros e exceptions
    catch (Exception | Error $ex) { // captura todas as exception e erros

        echo "Erro tratado em f1: {$ex->getMessage()}" . PHP_EOL;
        //return;
    }
    // catch (DivisionByZeroError $ex2) {
    //     echo "Erro tratado em f1: {$ex2->getMessage()}" . PHP_EOL;
    // }
    finally { // mesmo tendo um return no bloco try ou catch, o finally é executado
        echo "Sempre executa" . PHP_EOL;
    }

    f2();
    echo 'Saindo f1' . PHP_EOL;
}

function f2() : void {
    echo 'Entrei f2' . PHP_EOL;

    echo PHP_EOL . 'Saindo f2' . PHP_EOL;
}

echo 'Entrei main' . PHP_EOL;
f1();
echo 'Saindo main' . PHP_EOL;