<?php

namespace App\Student\Infrastructure\Factory;

use PDO;
use App\Student\API\StudentAPI;
use App\Student\Infrastructure\Service\StudentService;

class StudentAPIFactory
{
    public static function createStudentAPI(PDO $pdo): StudentAPI
    {
        return new StudentAPI(
            new StudentService($pdo)
        );
    }
}