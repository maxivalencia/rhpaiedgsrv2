<?php

namespace App\Controller;

use App\Entity\Personnels;
use App\Entity\Photos;
use App\Form\PersonnelsType;
use App\Repository\AffectationsPersonnelsRepository;
use App\Repository\ConjointsRepository;
use App\Repository\DecorationsPersonnelsRepository;
use App\Repository\DecorationsRepository;
use App\Repository\DiplomesPersonnelsRepository;
use App\Repository\DiplomesRepository;
use App\Repository\EnfantsRepository;
use App\Repository\ExConjointsRepository;
use App\Repository\FonctionsConjointsRepository;
use App\Repository\GradesRepository;
use App\Repository\NominationsPersonnelsRepository;
use App\Repository\PermissionsRepository;
use App\Repository\PersonnelsRepository;
use App\Repository\PhotosRepository;
use App\Repository\PunitionsRepository;
use App\Repository\SituationSanitaireRepository;
use App\Repository\RecompenseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class ConsultationPersonnelCivilController extends AbstractController
{
    /**
     * @Route("/consultation/personnel/civil", name="consultation_personnel_civil")
     */
    public function index(PersonnelsRepository $personnelsRepository, PhotosRepository $photosRepository): Response
    {               
        return $this->render('personnels/index.html.twig', [
            'personnels' => $personnelsRepository->findBy([], ["id" => "DESC"]),
            'photos' => $photosRepository->findAll(),
        ]);
        /* return $this->render('consultation_personnel_civil/index.html.twig', [
            'controller_name' => 'ConsultationPersonnelCivilController',
        ]); */
    }
}
