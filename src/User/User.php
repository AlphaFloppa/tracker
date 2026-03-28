<?php

namespace App\User;

use App\Student\App\Student;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    private string $role;

    public function __construct(
        private Student $currentUser                //Student | Admin
    )
    {
        if(
            $currentUser instanceof Student             //typeof
        )
        {
            $this->role = 'ROLE_STUDENT';
        }
    }

    public function getPassword(): ?string
    {
        return $this->currentUser->getPassword();
    }

    public function setPassword(string $password): void
    {
        $this->currentUser->setPassword($password);
    }

    public function eraseCredentials(): void
    {

    }

    public function getRoles(): array
    {
        return [
            $this->role
        ];
    }

    public function getUserIdentifier(): string
    {
        return $this->currentUser->getId();
    }

    public function hydrateUserData(): array
    {
        if($this->currentUser instanceof Student)
        {
            return $this->currentUser->hydrateStudentData();
        }        
        return [];                          //заглушка
    }

    public function getUserDTO(): Student               //|ADMIN
    {
        return $this->currentUser;
    }
}