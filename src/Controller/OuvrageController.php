<?php

namespace App\Controller;
use App\Entity\Auteur;
use App\Entity\Ouvrage;
use App\Form\OuvrageType;
use App\Repository\AuteurRepository;
use App\Repository\OuvrageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/ouvrage')]
class OuvrageController extends AbstractController
{
    #[Route('/', name: 'app_ouvrage_index', methods: ['GET'])]
    public function index(OuvrageRepository $ouvrageRepository): Response
    {
        return $this->render('ouvrage/index.html.twig', [
            'ouvrages' => $ouvrageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ouvrage_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OuvrageRepository $ouvrageRepository): Response
    {
        $ouvrage = new Ouvrage();
        $form = $this->createForm(OuvrageType::class, $ouvrage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ouvrageRepository->save($ouvrage, true);

            return $this->redirectToRoute('app_ouvrage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ouvrage/new.html.twig', [
            'ouvrage' => $ouvrage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ouvrage_show', methods: ['GET'])]
    public function show(Ouvrage $ouvrage): Response
    {
        return $this->render('ouvrage/show.html.twig', [
            'ouvrage' => $ouvrage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ouvrage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ouvrage $ouvrage, OuvrageRepository $ouvrageRepository): Response
    {
        $form = $this->createForm(OuvrageType::class, $ouvrage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ouvrageRepository->save($ouvrage, true);

            return $this->redirectToRoute('app_ouvrage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ouvrage/edit.html.twig', [
            'ouvrage' => $ouvrage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ouvrage_delete', methods: ['POST'])]
    public function delete(Request $request, Ouvrage $ouvrage, OuvrageRepository $ouvrageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ouvrage->getId(), $request->request->get('_token'))) {
            $ouvrageRepository->remove($ouvrage, true);
        }

        return $this->redirectToRoute('app_ouvrage_index', [], Response::HTTP_SEE_OTHER);
    }
  /**
 * @Route("/ouvrage/auteur/{id}", name="app_ouvrage_by_auteur")
 */
public function showByAuteur(Auteur $auteur , EntityManagerInterface $entityManager,OuvrageRepository $ouvrageRepository): Response
{
    $ouvrages = $ouvrageRepository->findAllByAuteur($auteur);

    return $this->render('ouvrage/by_auteur.html.twig', [
        'ouvrages' => $ouvrages,
        'auteur' => $auteur,
    ]);
}

}
