<?php

namespace App;

use App\Common\Infrastructure\ConnectionProvider;
use App\Student\API\StudentAPIInterface;
use App\Student\Infrastructure\Factory\StudentAPIFactory;
use PDO;

class ServiceProvider
{
    private PDO $pdo;

    public function __construct(
        ConnectionProvider $provider
    )
    {
        $this->pdo = $provider->getConnectionToDb();
    }

    public function getStudentAPI(): StudentAPIInterface
    {
        return StudentAPIFactory::createStudentAPI($this->pdo);
    }
}