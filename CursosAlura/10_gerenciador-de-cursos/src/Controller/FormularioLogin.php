<?php

namespace Alura\Cursos\Controller;

class FormularioLogin extends BaseController implements IControladorRequisicao
{
    public function processaRequisicao(): void
    {
        $this->renderizaHtml('login/formulario.php', [ 'titulo' => 'Login' ]);
    }
}