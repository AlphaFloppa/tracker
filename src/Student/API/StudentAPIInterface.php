<?php

namespace App\Student\API;

use App\Student\App\Student;

interface StudentAPIInterface
{
    public function findStudent(int $id): Student;

    public function createStudent(Student $student): void ;

    public function updateStudentPassword(int $id, string $password): void;

    public function deleteStudent(int $id): void;
}