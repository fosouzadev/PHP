<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Server\RequestHandlerInterface;

class CursosEmXml implements RequestHandlerInterface
{
    private $repository;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $cursos = $this->repository->findAll();
        $xml = new \SimpleXMLElement('<cursos/>');

        foreach ($cursos as $curso) {
            $cursoXml = $xml->addChild('curso');
            $cursoXml->addChild('id', $curso->getId());
            $cursoXml->addChild('descricao', $curso->getDescricao());
        }

        return new Response(200, [ 'Content-Type' => 'application/xml' ], $xml->asXML());
    }
}