<?php

namespace App\Controller;

use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/liste-personnes")
     */
    public function listPersonnes(PersonneRepository $personneRepository): JsonResponse
    {
        $personnes = $personneRepository->find(1);
        dump($personnes)
;
        return new JsonResponse($personnes);
    }
}
