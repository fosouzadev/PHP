<?php

namespace Alura\Cursos\Controller;

abstract class BaseController 
{
    public function renderizaHtml(string $view, array $data): void
    {
        extract($data); // transforma o array associativo em variaveis locais
        require __DIR__ . '/../../view/' . $view;
    }    
}