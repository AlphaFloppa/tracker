<?php

namespace App\User;

use App\Common\Infrastructure\ConnectionProvider;
use App\Student\App\Query\StudentQueryServiceInterface;
use App\Student\Infrastructure\Query\StudentQueryService;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserProvider implements UserProviderInterface
{
    private StudentQueryServiceInterface $queryService;
    public function __construct(
        ConnectionProvider $provider
    )
    {
        $this->queryService = new StudentQueryService(
            $provider->getConnectionToDb()
        );
    }

    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        $student = $this->queryService->findStudentByEmail($identifier);
        return new User($student);
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        return $user;
    }

    public function supportsClass(string $class): bool
    {
        return User::class === $class;
    }
}