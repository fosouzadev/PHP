<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao implements IControladorRequisicao
{
    public function processaRequisicao(): void
    {
        $titulo = 'Lista de cursos';
        require __DIR__ . '/../../view/cursos/formulario.php';
    }
}

