<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class NewController extends AbstractController
{
    #[Route('/new123', name: 'new123')]
    public function index(): JsonResponse
    {
        return $this->json([
            'new' => 'new'
        ]);
    }

}