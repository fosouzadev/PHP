<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\{Student, Phone};
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

        return $this->ToStudent($studentList);
    }

    public function studentsWithPhones(): array
    {
        $statement = $this->pdo->query('
            SELECT 
                st.id, st.name, st.birth_date,
                ph.id phoneId, ph.area_code, ph.number
            FROM 
                students st join phones ph
                ON st.id = ph.student_id
        ');
        $studentList = $statement->fetchAll();

        $studentsResult = [];
        foreach ($studentList as $student) {
            if (!array_key_exists($student['id'], $studentsResult)) {
                $studentsResult[$student['id']] = new Student (
                    $student['id'],
                    $student['name'],
                    new \DateTimeImmutable($student['birth_date'])
                );
            }
            
            $studentsResult[$student['id']]->addPhone(new Phone(
                $student['phoneId'],
                $student['area_code'],
                $student['number']
            ));
        }

        return $studentsResult;
    }

    public function studentById(int $id): Student
    {
        $statement = $this->pdo->prepare('SELECT * FROM students where id = :id');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $student = $statement->fetch();

        $studentList = [];
        $studentList[] = $student;

        return $this->ToStudent($studentList)[0];
    }

    public function studentBirthAt(\DateTimeInterface $birthDate): array
    {
        $statement = $this->pdo->prepare('SELECT * FROM students WHERE birth_date = :birth_date');
        $statement->bindValue(':birth_date', $birthDate->format('Y-m-d'));
        $statement->execute();

        $studentList = $statement->fetchAll(PDO::FETCH_ASSOC); // FETCH_ASSOC foi definido como padrão no pdo

        return $this->ToStudent($studentList);
    }

    private function ToStudent(array $students) : array
    {
        $studentsResult = [];

        foreach ($students as $student) {
            $studentsResult[] = $studentObj = new Student (
                $student['id'],
                $student['name'],
                new \DateTimeImmutable($student['birth_date'])
            );

            $this->fillPhonesOf($studentObj);
        }

        return $studentsResult;
    }

    private function fillPhonesOf(Student $student): void
    {
        $sql = 'SELECT id, area_code, number FROM phones WHERE student_id = :studentId';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':studentId', $student->id(), PDO::PARAM_INT);
        $statement->execute();

        $phoneDataList = $statement->fetchAll();
        foreach ($phoneDataList as $phoneData) {
            $phone = new Phone(
                $phoneData['id'],
                $phoneData['area_code'],
                $phoneData['number']
            );

            $student->addPhone($phone);
        }

        $phoneDataList = $statement->fetchAll();
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
        
        // if ($statement === false) {
        //     throw new \Exception($this->pdo->errorInfo()[2]);
        // }

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