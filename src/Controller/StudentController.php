<?php

namespace App\Controller;

use App\ServiceProvider;
use App\Student\API\StudentAPIInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends AbstractController
{
    private StudentAPIInterface $studentAPI;

    public function __construct(
        ServiceProvider $provider
    )
    {
        $this->studentAPI = $provider->getStudentAPI();
    }

    public function findStudent(int $id): Response
    {
        $studentData = $this->studentAPI->findStudent($id);
        return new JsonResponse(
            $studentData->hydrateStudentData()
        );
    }

    public function deleteStudent(int $id): Response
    {
        $this->studentAPI->deleteStudent($id);
        return new Response();   
    }
}