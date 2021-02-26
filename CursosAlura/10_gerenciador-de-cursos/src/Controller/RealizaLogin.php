<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizaLogin extends BaseController implements IControladorRequisicao
{
    /** @var ObjectRepository $repository */
    private $repository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repository = $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);  // fulano@teste.com.br
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING); // 123456

        if (is_null($email) || $email === false ||
            is_null($senha) || $senha === false) {
            echo 'Dados inválidos';
            return;
        }

        $usuario = $this->repository->findOneBy([ 'email' => $email ]);

        if ($usuario === null) {
            echo 'Usuário não cadastrado';
            return;
        }

        if (!$usuario->senhaEstaCorreta($senha)) {
            echo "E-mail ou senha inválidos";
            return;
        }

        $_SESSION['logado'] = true;

        header('Location: /listar-cursos');
    }
}