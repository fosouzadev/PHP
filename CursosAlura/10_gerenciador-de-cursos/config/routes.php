<?php

use Alura\Cursos\Controller\{
    Exclusao,
    FormularioEdicao,
    FormularioInsercao,
    ListarCursos,
    Persistencia,
    FormularioLogin,
    RealizaLogin
};

$rotas = [
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/alterar-curso' => FormularioEdicao::class,
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizaLogin::class
];

return $rotas;