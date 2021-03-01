<?php

use Alura\Cursos\Controller\{
    FormularioInsercao,
    CursosEmJson,
    CursosEmXml
};

$rotas = [
    '/novo-curso' => FormularioInsercao::class,
    '/cursos-json' => CursosEmJson::class,
    '/cursos-xml' => CursosEmXml::class
];

return $rotas;