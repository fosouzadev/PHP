<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class FormularioEdicao extends BaseController implements IControladorRequisicao
{
    /** @var ObjectRepository $repository */
    private $repository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repository = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id === null || $id === false) {
            header('Location: /listar-cursos');
            return;
        }

        $curso = $this->repository->find($id);
        $titulo = 'Alterar curso ' . $curso->getDescricao();

        $data = [ 'curso' => $curso, 'titulo' => $titulo ];
        $this->renderizaHtml('cursos/formulario.php', $data);
        //require __DIR__ . '/../../view/cursos/formulario.php';
    }
}