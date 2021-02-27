<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizaLogin extends BaseController implements IControladorRequisicao
{
    use FlashMessageTrait;

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
                $this->defineMensagem('danger', 'Dados inválidos');
            header('Location: /login');
            return;
        }

        $usuario = $this->repository->findOneBy([ 'email' => $email ]);

        if ($usuario === null) {
            $this->defineMensagem('danger', 'Usuário não cadastrado');
            header('Location: /login');
            return;
        }

        if (!$usuario->senhaEstaCorreta($senha)) {
            $this->defineMensagem('danger', "E-mail ou senha inválidos");
            header('Location: /login');
            return;
        }
   
        $_SESSION['logado'] = true;

        header('Location: /listar-cursos');
    }
}