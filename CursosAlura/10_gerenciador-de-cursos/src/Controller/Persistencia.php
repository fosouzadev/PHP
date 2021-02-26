<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia extends BaseController implements IControladorRequisicao
{
    /** @var \Doctrine\ORM\EntityManagerInterface */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();        
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        //$curso->setDescricao($_POST['descricao']); // busca o dado sem limpar

        /** @var Curso $curso */
        $curso = null;        

        if ($id !== null && $id !== false) {
            $curso = $this->entityManager->find(Curso::class, $id);
        } else {
            $curso = new Curso();
            $this->entityManager->persist($curso);
        }

        if ($curso !== null) {
            $curso->setDescricao($descricao);
            $this->entityManager->flush();
        }

        header('Location: /listar-cursos', false, 302);
    }    
}