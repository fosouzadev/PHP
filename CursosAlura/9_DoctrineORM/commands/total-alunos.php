<?php

use Alura\Doctrine\Entity\{Aluno,Curso,Telefone};
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

$classeAluno = Aluno::class;
$dql = "SELECT COUNT(a) FROM $classeAluno a";
$query = $entityManager->createQuery($dql);

// caso tenha mais de um retorno usar getScalarResult
$totalAlunos = $query->getSingleScalarResult(); 

echo "Total de alunos: $totalAlunos";