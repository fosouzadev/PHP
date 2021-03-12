<?php

function convertTest($var)
{
    echo gettype($var) . ' ' . intval($var) . PHP_EOL; 
    echo gettype($var) . ' ' . (int)$var . PHP_EOL; 
}

convertTest(542.554);        // float
convertTest(0x21E);          // hexadecimal
convertTest(01036);          // octal
convertTest(0b10_0001_1110); // binario
convertTest(true);
convertTest(false);
convertTest(null);
convertTest('542');
convertTest('542.554');
convertTest('542,554');
convertTest('Abc');