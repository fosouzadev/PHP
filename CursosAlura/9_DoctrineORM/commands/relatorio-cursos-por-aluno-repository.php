<?php

use Alura\Doctrine\Entity\{Aluno,Curso,Telefone};
use Alura\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

function mapTelefones(Aluno $aluno): string
{
    $numeros = $aluno->telefones()
        ->map(function (Telefone $tel) {
            return $tel->numero();
        })
        ->toArray();
    
    return implode(', ', $numeros);
}

function mapCursos(Aluno $aluno): string
{
    $numeros = $aluno->cursos()
        ->map(function (Curso $curso) {
            return $curso->nome();
        })
        ->toArray();
    
    return implode(', ', $numeros);
}

/** @var AlunoRepository $alunoRepository */
$alunoRepository = $entityManager->getRepository(Aluno::class);

/** @var Aluno[] $alunos */
$alunos = $alunoRepository->buscaCursosPorAluno();

foreach ($alunos as $aluno) {
    $telefones = mapTelefones($aluno);
    $cursos = mapCursos($aluno);

    echo "{$aluno->id()} {$aluno->nome()} {$telefones} {$cursos}" . PHP_EOL;
}