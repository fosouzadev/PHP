<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

$maria = $alunoRepository->find(2);
$maria->setNome('Maria Alencar Jesuita Savage');

$entityManager->flush();
