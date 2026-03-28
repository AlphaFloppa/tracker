<?php

namespace App\Controller;

use App\ServiceProvider;
use App\Student\API\StudentAPIInterface;
use App\Student\App\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\User\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Throwable;

class AuthController extends AbstractController
{

    private StudentAPIInterface $studentAPI;

    public function __construct(
        ServiceProvider $provider
    )
    {
        $this->studentAPI = $provider->getStudentAPI();
    }

    public function register(Request $request, UserPasswordHasherInterface $hasher): Response
    {
        $role = $request->get('role');
        if($role === 'STUDENT')
        {
            $student = new Student(
                uniqid(),
                $request->get('class'),
                $request->get('email'),
                $request->get('password'),
                $request->get('fullName'),
                $request->get('parentFullName'),
                $request->get('phone')
            );

            try{
                $student->validate();
            } catch(Throwable $excp) {
                return new Response('', Response::HTTP_BAD_REQUEST);
            }

            $user = new User($student);

            $user->setPassword(
                $hasher->hashPassword($user, $user->getPassword())
            );

            $this->studentAPI->createStudent(
                $user->getUserDTO()
            );
        }

        return new Response(Response::HTTP_OK);

    }   
}