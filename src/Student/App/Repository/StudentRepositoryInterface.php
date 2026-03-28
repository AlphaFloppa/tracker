<?php

namespace App\Student\App\Repository;

use App\Student\App\Student;

interface StudentRepositoryInterface
{
    public function createStudent(Student $student): void;

    public function deleteStudent(string $id): void;

    public function updateStudentPassword(string $id, string $password): void;
}