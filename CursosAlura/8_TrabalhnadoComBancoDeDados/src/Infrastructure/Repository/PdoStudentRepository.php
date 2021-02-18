<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use PDO;

class PdoStudentRepository implements StudentRepository
{
    private Pdo $pdo;

    public function __construct(Pdo $pdo)
    {
        $this->pdo = $pdo;
    }

    public function allStudents(): array 
    {
        $statement = $this->pdo->query('SELECT * FROM students');
        $studentList = $statement->fetchAll(PDO::FETCH_ASSOC);

        $students = [];

        foreach ($studentList as $student) {
            $students[] = new Student (
                $student['id'],
                $student['name'],
                new \DateTimeImmutable($student['birth_date'])
            );
        }

        return $students;
    }

    public function studentBirthAt(\DateTimeInterface $birthDate): array
    {
        $statement = $this->pdo->prepare('SELECT * FROM students WHERE birth_date = :birth_date');
        $statement->bindValue(':birth_date', $birthDate->format('Y-m-d'));
        $statement->execute();

        $studentList = $statement->fetchAll(PDO::FETCH_ASSOC);

        $students = [];

        foreach ($studentList as $student) {
            $students[] = new Student (
                $student['id'],
                $student['name'],
                new \DateTimeImmutable($student['birth_date'])
            );
        }

        return $students;
    }

    public function save(Student $student): bool
    {
        if ($student->id() === null) {
            return $this->insert($student);
        }

        return $this->update($student);
    }

    private function insert(Student $student): bool
    {
        $sql = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
        $statement = $this->pdo->prepare($sql);
        
        // $statement->bindValue(':name', $student->name());
        // $statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
        // return $statement->execute();
        
        // ou

        $success = $statement->execute([
            ':name' => $student->name(),
            ':birth_date' => $student->birthDate()->format('Y-m-d')
        ]);

        if ($success) {
            $student->setId($this->pdo->lastInsertId());
        }

        return $success;
    }

    private function update(Student $student): bool
    {
        $sql = "UPDATE students SET name = :name, birth_date = :birth_date WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':name', $student->name());
        $statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
        $statement->bindValue(':id', $student->id());

        return $statement->execute();
    }

    public function remove(Student $student): bool
    {
        $statement = $this->pdo->prepare('DELETE FROM students WHERE id = :id');
        $statement->bindValue(':id', $student->id(), PDO::PARAM_INT);

        return $statement->execute();
    }
}