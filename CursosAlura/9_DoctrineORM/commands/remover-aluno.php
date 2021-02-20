<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

// retorna uma referencia gerenciada somente com o id
$joaoSilveira = $entityManager->getReference(Aluno::class, 3);

// com o getreference, sempre irá retornar um objeto
// enviar null para o remove não irá gerar nenhum erro ao chamar o flush
if ($joaoSilveira !== null) {
    $entityManager->remove($joaoSilveira);

    $entityManager->flush();

    echo 'Aluno excluído';
} else {
    echo 'Aluno não existe';
}