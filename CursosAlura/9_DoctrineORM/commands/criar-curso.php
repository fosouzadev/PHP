<?php

use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerFactory())->getEntityManager();

$curso1 = new Curso();
$curso1->setNome('Formação PHP');

$curso2 = new Curso();
$curso2->setNome('Formação Linux');

$entityManager->persist($curso1);
$entityManager->persist($curso2);

$entityManager->flush();