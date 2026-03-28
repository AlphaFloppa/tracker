<?php

namespace App\Student\Infrastructure\Repository;

use PDO;
use App\Student\App\Repository\StudentRepositoryInterface;
use App\Student\App\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function __construct(
        private PDO $pdo
    )
    {
    }

    public function createStudent(Student $student): void
    {
        $query = <<<SQL
            INSERT INTO student
            (id, class, email, password_hash, full_name, parent_full_name, phone)
            VALUES
            (:id, :class, :email, :password, :fullName, :parentFullName, :phone)
        SQL;

        $stmt = $this->pdo->prepare($query);

        $stmt->execute(
            [
                'id' => $student->getId(),
                'class' => $student->getClass(),
                'email' => $student->getEmail(),
                'password' => $student->getPassword(),
                'fullName' => $student->getFullName(),
                'parentFullName' => $student->getParentName(),
                'phone' => $student->getPhone()
            ]
        );
    }

    public function deleteStudent(string $id): void
    {
        $query = <<<SQL
            DELETE FROM student
            WHERE id = :id
        SQL;

        $stmt = $this->pdo->prepare($query);

        $stmt->execute(
            [
                'id' => $id
            ]
        );
    }

    public function updateStudentPassword(string $id, string $password): void
    {
        $query = <<<SQL
            UPDATE student
            SET password_hash = :password
            WHERE id = :id
        SQL;

        $stmt = $this->pdo->prepare($query);

        $stmt->execute(
            [
                'id' => $id,
                'password' => $password
            ]
        );
    }
}