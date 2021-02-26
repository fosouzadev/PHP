<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListarCursos extends BaseController implements IControladorRequisicao
{
    private $repository;
    
    public function __construct() {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repository = $entityManager->getRepository(Curso::class);
    }
    
    public function processaRequisicao(): void
    {
        $cursos = $this->repository->findAll();
        $titulo = 'Lista de cursos';

        $data = [ 'cursos' => $cursos, 'titulo' => $titulo ];
        $this->renderizaHtml('cursos/listar-cursos.php', $data);

        //require __DIR__ . '/../../view/cursos/listar-cursos.php';
    }
}
