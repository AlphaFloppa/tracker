<?php

namespace App\Student\App\Service;

use App\Student\App\Student;

interface StudentServiceInterface

{
    public function findStudent(int $id): Student;

    public function createStudent(Student $student): void ;

    public function updateStudentPassword(int $id, string $password): void;

    public function deleteStudent(int $id): void;
}