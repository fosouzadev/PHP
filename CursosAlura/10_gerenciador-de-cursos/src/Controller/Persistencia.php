<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements IControladorRequisicao
{
    /** @var \Doctrine\ORM\EntityManagerInterface */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();        
    }

    public function processaRequisicao(): void
    {
        // limpar dados do input para proteção 
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

        // criar curso
        $curso = new Curso();
        $curso->setDescricao($descricao);
        //$curso->setDescricao($_POST['descricao']); // busca o dado sem limpar

        // inserir
        $this->entityManager->persist($curso);
        $this->entityManager->flush();

        header('Location: /listar-cursos', false, 302);
    }    
}