<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnalysePersonnelController extends AbstractController
{
    /**
     * @Route("/analyse/personnel", name="analyse_personnel")
     */
    public function index(): Response
    {
        return $this->render('analyse_personnel/index.html.twig', [
            'controller_name' => 'AnalysePersonnelController',
        ]);
    }
}
