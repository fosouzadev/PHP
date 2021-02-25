<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\{ListarCursos, FormularioInsercao, Persistencia};

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($caminho, $rotas)) {
    http_response_code(404);
    exit();
}

$classeControladora = $rotas[$caminho];
/** @var IControladorRequisicao $controlador */
$controlador = new $classeControladora();
$controlador->processaRequisicao();


// antes de usar routes
// switch ($_SERVER['PATH_INFO']) {
//     case '/listar-cursos':
//         (new ListarCursos())->processaRequisicao();
//         break;
//     case '/novo-curso':
//         (new FormularioInsercao())->processaRequisicao();
//         break;
//     case '/salvar-curso':
//         (new Persistencia())->processaRequisicao();
//         break;
//     default:
//         echo 'Erro 404';
//         break;
// }

