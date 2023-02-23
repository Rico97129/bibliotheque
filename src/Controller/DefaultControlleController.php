<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchType;

class DefaultControlleController extends AbstractController
{
       /**
     * @Route("/default", name="default")
     */

    /* 
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    */
    
    /*
    #[Route('/search')]
    public function index(): Response
    {
        $form = $this->createForm(SearchType::class);

        return $this->render('default_controlle/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
    */
    #[Route('/search')]
    public function index(Request $request): Response
{

    $user = new User();

    $form = $this->createForm(SearchType::class, $user);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()){
        dump($user);die;
    }

    return $this->render('default_controlle/index.html.twig', [
        'form' => $form->createView()
    ]);
}
}
