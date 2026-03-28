<?php

namespace App\Student\Infrastructure\Query;

use App\Student\App\Student;
use PDO;
use App\Student\App\Query\StudentQueryServiceInterface;

class StudentQueryService implements StudentQueryServiceInterface
{
    public function __construct(
        private PDO $pdo
    )
    {
    }

    public function findStudent(string $id): Student
    {
        $query = <<<SQL
            SELECT * FROM student
            WHERE id = :id
        SQL;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute(
            [
                'id' => $id
            ]
        );

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Student(
            $id,
            $data['class'],
            $data['email'],
            $data['password_hash'],
            $data['full_name'],
            $data['parent_full_name'],
            $data['phone']
        );
    }

    public function findStudentByEmail(string $email): Student
    {
        $query = <<<SQL
            SELECT * FROM student
            WHERE email = :email
        SQL;

        $stmt = $this->pdo->prepare($query);
        $stmt->execute(
            [
                'email' => $email
            ]
        );

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Student(
            $data['id'],
            $data['class'],
            $email,
            $data['password_hash'],
            $data['full_name'],
            $data['parent_full_name'],
            $data['phone']
        );
    }
}