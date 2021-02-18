<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';


$pdo = ConnectionCreator::createConnection();

// simulação de sql injection
$student = new Student(null, "Fulano da Silva', ''); DROP TABLE students; --", new \DateTimeImmutable('1997-10-15'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";
// ou 
// $sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";

$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));
// ou 
// $statement->bindValue(':name', $student->name());
// $statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

if ($statement->execute()) {
    echo 'Aluno incluído';
}