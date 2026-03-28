<?php

namespace App\Student\App;

use RuntimeException;

class Student
{
    public function __construct(
        private string $id,
        private int $class,
        private string $email,
        private string $password,
        private string $fullName,
        private string $parentFullName,
        private string $phone
    )
    {
    }

    public function hydrateStudentData(): array
    {
        return [
            'id' => $this->getId(),
            'class' => $this->getClass(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'fullName' => $this->getFullName(),
            'parentName' => $this->getParentName(),
            'phone' => $this->getPhone()
        ];
    }

    public function validate(): void
    {
        if(
            $this->class < 1 || $this->class > 11
        ) 
        {
            throw new RuntimeException('Invalid class param');
        }

        if(
            !preg_match(
                '/^[a-zA-Z0-9.%_+-$#]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/',
                $this->email
            )
        )
        {
            throw new RuntimeException('Invalid email');
        }

        if(
            !preg_match(
                '/^[а-яА-я]+ [а-яА-я]+ [а-яА-я]+$/u',
                $this->fullName
            ) ||
            !preg_match(
                '/^[а-яА-я]+ [а-яА-я]+ [а-яА-я]+$/u',
                $this->parentFullName
            )
        )
        {
            throw new RuntimeException('Invalid name');
        }

        if(
           !preg_match(
                '/+7\d{10}/',
                $this->phone
           )
        )
        {
            throw new RuntimeException('Invalid phone');
        }

    }

    public function getId(): string
    {
        return $this->id;    
    }

    public function getClass(): int
    {
        return $this->class;    
    }

    public function getEmail(): string
    {
        return $this->email;    
    }

    public function getPassword(): string
    {
        return $this->password;    
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getFullName(): string
    {
        return $this->fullName;    
    }

    public function getParentName(): string
    {
        return $this->parentFullName;    
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}