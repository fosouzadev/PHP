<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

/** @var Curso $php */
$php = $entityManager->find(Curso::class, 1);
/** @var Curso $linux */
$linux = $entityManager->find(Curso::class, 2);

/** @var Aluno $joao */
$joao = $entityManager->find(Aluno::class, 4);
/** @var Aluno $maria */
$maria = $entityManager->find(Aluno::class, 5);

if ($php !== null && $linux !== null && $joao !== null && $maria !== null) {
    
    $php->addAluno($joao)->addAluno($maria);
    $linux->addAluno($joao)->addAluno($maria);

    $entityManager->flush();
    echo 'Alunos vinculados aos cursos';
}
