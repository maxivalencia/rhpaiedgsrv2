<?php

namespace App\Controller;

use App\Repository\AffectationsPersonnelsRepository;
use App\Repository\DecorationsPersonnelsRepository;
use App\Repository\EnfantsRepository;
use App\Repository\NominationsPersonnelsRepository;
use App\Repository\PermissionsRepository;
use App\Repository\PersonnelsRepository;
use App\Repository\RadiationsPersonnelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dashboard")
 */
class DashBoardController extends AbstractController
{
    /**
     * @Route("/dash/board", name="dash_board")
     */
    public function index(PersonnelsRepository $personnelsRepository, PermissionsRepository $permissionsRepository, NominationsPersonnelsRepository $nominationsPersonnelsRepository, DecorationsPersonnelsRepository $decorationsPersonnelsRepository, EnfantsRepository $enfantsRepository, AffectationsPersonnelsRepository $affectationsPersonnelsRepository, RadiationsPersonnelsRepository $radiationsPersonnelsRepository)
    {
        return $this->render('dash_board/index.html.twig', [
            'controller_name' => 'DashBoardController',
        ]);
    }
}
