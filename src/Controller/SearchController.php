<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search_mot', methods: ['GET'])]
    public function ouvragesAvecNbOccurrences(Request $request, EntityManagerInterface $entityManager): Response 
    {
        $colonne = $request->query->get('colonne', 'Harry');

        $query = $entityManager->createQuery(
            'SELECT o, COUNT(a.id) AS nb_occurrences
            FROM App\Entity\Ouvrage o
            INNER JOIN o.auteur a
            WHERE a.nom LIKE :colonne OR o.titre LIKE :colonne
            GROUP BY o.id, o.titre
            HAVING nb_occurrences > 0
            ORDER BY nb_occurrences DESC'
        );
        $query->setParameter('colonne', '%'.$colonne.'%');

        $ouvrages = $query->getResult();

        return $this->render('search/mot.html.twig', [
            'ouvrage' => $ouvrages,
        ]);
    }
}
