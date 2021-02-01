<?php

spl_autoload_register(function (string $className) {
    $filePath = str_replace('alura\banco', 'src', $className);
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $filePath) . 'php';

    if (file_exists($filePath))
        require $filePath;
});