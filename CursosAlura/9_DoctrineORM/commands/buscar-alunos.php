<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunos */
$alunos = $alunoRepository->findAll();
$alunoId2 = $alunoRepository->find(2);
$maria = $alunoRepository->findOneBy([ 'nome' => 'Maria da Silva Mendes' ]);
$alunoList = $alunoRepository->findBy(
    [ 'nome' => 'Maria da Silva Mendes' ], // filtro, pode ser []
    [ 'id' => 'DESC' ], // ordenacao
    3, // limit, quantidade deve ser retornada
    0, // offset, a partir de qual registro
);

function mapTelefones(Aluno $aluno): string
{
    $telefones = $aluno->telefones();

    $numeros = $telefones
        ->map(function ($tel) {
            return $tel->numero();
        })
        ->toArray();
    
    return implode(', ', $numeros);
}


echo PHP_EOL . "findAll" . PHP_EOL;
foreach ($alunos as $aluno1) {
    $telefones1 = mapTelefones($aluno1);

    echo "{$aluno1->id()} {$aluno1->nome()} {$telefones1}" . PHP_EOL;
}

echo PHP_EOL . "findBy" . PHP_EOL;
foreach ($alunoList as $aluno2) {
    $telefones2 = mapTelefones($aluno2);

    echo "{$aluno2->id()} {$aluno2->nome()} {$telefones2}" . PHP_EOL;
}

echo PHP_EOL . "find" . PHP_EOL;
$telefonesId2 = mapTelefones($alunoId2);
echo "{$alunoId2->id()} {$alunoId2->nome()} {$telefonesId2}" . PHP_EOL;

echo PHP_EOL . "findOneBy" . PHP_EOL;
$telefonesStr = mapTelefones($maria);
echo "{$maria->id()} {$maria->nome()} {$telefonesStr}" . PHP_EOL;