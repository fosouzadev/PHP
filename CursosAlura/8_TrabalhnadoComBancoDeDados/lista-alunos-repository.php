<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($pdo);

echo 'allStudents' . PHP_EOL;
var_dump($repository->allStudents());

echo 'studentById' . PHP_EOL;
var_dump($repository->studentById(1));

echo 'studentBirthAt' . PHP_EOL;
var_dump($repository->studentBirthAt(new \DateTimeImmutable('1985-05-01')));

echo 'studentsWithPhones' . PHP_EOL;
var_dump($repository->studentsWithPhones());