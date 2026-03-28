<?php

namespace App\Student\App\Query;

use App\Student\App\Student;

interface StudentQueryServiceInterface
{
    public function findStudent(string $id): Student;

    public function findStudentByEmail(string $email): Student;
}