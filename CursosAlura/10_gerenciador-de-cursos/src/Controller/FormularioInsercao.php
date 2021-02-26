<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao extends BaseController implements IControladorRequisicao
{
    public function processaRequisicao(): void
    {
        $this->renderizaHtml('cursos/formulario.php', [ 'titulo' => 'Lista de cursos' ]);
        //$titulo = 'Lista de cursos';
        //require __DIR__ . '/../../view/cursos/formulario.php';
    }
}

