<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;
use Alura\Pdo\Domain\Model\Student;

require 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($pdo);

$pdo->beginTransaction();

$studentRepository->save(new Student(null, 'Nico Steppat', new DateTimeImmutable('1985-05-01')));
$studentRepository->save(new Student(null, 'Sergio Lopes', new DateTimeImmutable('1985-05-01')));

$pdo->commit();