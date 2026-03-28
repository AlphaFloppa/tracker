<?php

namespace App\Student\Infrastructure\Service;

use App\Student\App\Student;
use App\Student\App\Service\StudentServiceInterface;
use App\Student\App\Query\StudentQueryServiceInterface;
use App\Student\App\Repository\StudentRepositoryInterface;
use App\Student\Infrastructure\Query\StudentQueryService;
use App\Student\Infrastructure\Repository\StudentRepository;
use PDO;

class StudentService implements StudentServiceInterface
{
    private StudentQueryServiceInterface $queryService;
    private StudentRepositoryInterface $repository;

    public function __construct(
        PDO $pdo
    )
    {
        $this->queryService = new StudentQueryService($pdo);
        $this->repository = new StudentRepository($pdo);
    }

    public function createStudent(Student $student): void
    {
        $this->repository->createStudent($student);
    }

    public function findStudent(int $id): Student
    {
        return $this->queryService->findStudent($id);
    }

    public function deleteStudent(int $id): void
    {
        $this->repository->deleteStudent($id);
    }

    public function updateStudentPassword(int $id, string $password): void
    {
        $this->repository->updateStudentPassword($id, $password);        
    }
}