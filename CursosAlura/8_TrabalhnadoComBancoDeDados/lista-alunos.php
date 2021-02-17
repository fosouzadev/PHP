<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$statement = $pdo->query('SELECT * FROM students');

$studentList = $statement->fetchAll(); 

// retorna os dados em dois formatos de array associativo, indice e nome
echo $studentList[0]['name'] . PHP_EOL;
echo $studentList[0][1] . PHP_EOL;
var_dump($studentList);

// podemos alterar o formato de retorno do fetchAll PDO::FETCH_CLASS
// transforma em objeto, porém as colunas do banco precisam ser iguais as propriedades da classe
// não consegue chamar o construtor dessa forma
//$studentList = $statement->fetchAll(PDO::FETCH_CLASS, Student::class);

// podemos alterar o formato de retorno do fetchAll PDO::FETCH_ASSOC
echo PHP_EOL;
$statement2 = $pdo->query('SELECT * FROM students');
$studentList2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

$students = [];

foreach ($studentList2 as $student) {
    $students[] = new Student (
        $student['id'],
        $student['name'],
        new \DateTimeImmutable($student['birth_date'])
    );
}
var_dump($students);

// retornar somente um registro
echo PHP_EOL;
$statement3 = $pdo->query('SELECT * FROM students WHERE id = 1');
$student1 = $statement3->fetch(PDO::FETCH_ASSOC);
var_dump($student1);