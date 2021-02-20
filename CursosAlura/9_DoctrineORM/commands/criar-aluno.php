<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

$aluno = new Aluno();
$aluno->setNome("Maria Judite");

$telefone1 = new Telefone();
$telefone1->setNumero("(11) 95874-7845");

$telefone2 = new Telefone();
$telefone2->setNumero("(11) 99632-2584");

// vincular telefones ao aluno de duas formas
$aluno->addTelefone($telefone1);
$telefone2->setAluno($aluno);

// iniciar observação do objeto para persistência
$entityManager->persist($aluno);

// essa observação de entidades filhas podem ser configurada na entidade (dataanottations)
$entityManager->persist($telefone1);
$entityManager->persist($telefone2);

// caso altere apos o inicio da observação, o novo valor será persistido
//$aluno->setNome('João Mendes Junior');

// persistir no banco
$entityManager->flush();

echo 'Aluno inserido';