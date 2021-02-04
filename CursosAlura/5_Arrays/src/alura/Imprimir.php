<?php

namespace alura;

class Imprimir {
    
    public static function EchoArray(array $array) {
        foreach ($array as $i => $valor) {
            echo "$i -> $valor \n";
        }  
    }

    public static function EchoString(string $string) {
        echo $string . PHP_EOL;
    }

}