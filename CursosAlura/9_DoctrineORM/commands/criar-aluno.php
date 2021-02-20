<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

$aluno = new Aluno();
$aluno->setNome("Maria da Silva");

// iniciar observação do objeto para persistência
$entityManager->persist($aluno);

// caso altere apos o inicio da observação, o novo valor será persistido
$aluno->setNome('Maria da Silva Mendes');

// persistir no banco
$entityManager->flush();

var_dump($aluno);