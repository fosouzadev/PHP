<?php

require 'vendor/autoload.php';
//require 'src/Buscador.php'; // configurado no composer.json

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

Teste1::Metodo();
Teste2::Metodo();

$client = new Client([ 'base_uri' => 'https://www.alura.com.br' ]);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    exibeMensagem($curso);
}