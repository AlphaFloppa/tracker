<?php

namespace App\Student\API;

use App\Student\App\Student;
use App\Student\App\StudentServiceInterface;
use App\Student\API\StudentAPIInterface;

class StudentAPI implements StudentAPIInterface
{
    public function __construct(
        private StudentServiceInterface $service
    )
    {
    }

    public function createStudent(Student $student): void
    {
        $this->service->createStudent($student);
    }

    public function findStudent(int $id): Student
    {
        return $this->service->findStudent($id);
    }

    public function deleteStudent(int $id): void
    {
        $this->service->deleteStudent($id);
    }

    public function updateStudentPassword(int $id, string $password): void
    {
        $this->service->updateStudentPassword($id, $password);        
    }
}