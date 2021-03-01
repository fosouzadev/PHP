<?php

require __DIR__ . '/../vendor/autoload.php';

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Container\ContainerInterface;

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($caminho, $rotas)) {
    http_response_code(404);
    exit();
}

session_start();

// if ($caminho !== '/login' && $caminho !== '/realiza-login' && !isset($_SESSION['logado'])) {
//     header('Location: /login');
//     exit();
// }

$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator(
    $psr17Factory,
    $psr17Factory,
    $psr17Factory,
    $psr17Factory
);
$request = $creator->fromGlobals();

/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/dependencies.php';

$classeControladora = $rotas[$caminho];
/** @var RequestHandlerInterface $controlador */
$controlador = $container->get($classeControladora); //new $classeControladora();
$response = $controlador->handle($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();