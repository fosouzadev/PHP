<?php

use Alura\Doctrine\Entity\{Aluno,Curso,Telefone};
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

// definição de log para ver sqls executados
$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

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

$classeAluno = Aluno::class;
$dql = "SELECT aluno, telefones, cursos FROM $classeAluno aluno JOIN aluno.telefones telefones JOIN aluno.cursos cursos";
$query = $entityManager->createQuery($dql);

/** @var Aluno[] $alunos */
$alunos = $query->getResult();

foreach ($alunos as $aluno) {
    $telefones = mapTelefones($aluno);
    $cursos = mapCursos($aluno);

    echo "{$aluno->id()} {$aluno->nome()} {$telefones} {$cursos}" . PHP_EOL;
}

print_r($debugStack);