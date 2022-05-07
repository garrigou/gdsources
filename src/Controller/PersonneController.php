<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PersonneController extends AbstractController
{
    /**
     * @Route("/liste-personnes", name="liste-personnes")
     */
    public function listePersonnes(PersonneRepository $personneRepository): Response
    {
        return $this->render('personnes/liste.html.twig', [
            'personnes' => $personneRepository->findAll()
        ]);
    }

    /**
    * @Route("/personne/{id}", name="personne")
    * @ParamConverter("personnne", class="App\Entity\Personne")
    */
    public function affiche(Personne $personne)
    {
        return $this->render('personnes/personne.html.twig', [
            'personne' => $personne
        ]);
        return $personne;
    }
}
