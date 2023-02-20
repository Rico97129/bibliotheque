<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RichardsonController extends AbstractController
{
    #[Route('/richardson', name: 'app_richardson')]
    public function index(): Response
    {
        return $this->render('richardson/index.html.twig', [
            'controller_name' => 'RichardsonController',
        ]);
    }
}
