<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunos */
$alunos = $alunoRepository->findAll();
$joao = $alunoRepository->find(1);
$maria = $alunoRepository->findOneBy([ 'nome' => 'Maria da Silva Mendes' ]);
$alunoList = $alunoRepository->findBy(
    [ 'nome' => 'Maria da Silva Mendes' ], // filtro, pode ser []
    [ 'id' => 'DESC' ], // ordenacao
    3, // limit, quantidade deve ser retornada
    0, // offset, a partir de qual registro
);

echo PHP_EOL . "findAll" . PHP_EOL;
foreach ($alunos as $aluno1) {
    echo "{$aluno1->id()} {$aluno1->nome()}" . PHP_EOL;
}

echo PHP_EOL . "findBy" . PHP_EOL;
foreach ($alunoList as $aluno2) {
    echo "{$aluno2->id()} {$aluno2->nome()}" . PHP_EOL;
}

echo PHP_EOL . "find" . PHP_EOL;
echo "{$joao->id()} {$joao->nome()}" . PHP_EOL;

echo PHP_EOL . "findOneBy" . PHP_EOL;
echo "{$maria->id()} {$maria->nome()}" . PHP_EOL;