<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SaisieFicheController extends AbstractController
{
    /**
     * @Route("/saisie/fiche", name="saisie_fiche")
     */
    public function index(): Response
    {
        return $this->render('saisie_fiche/index.html.twig', [
            'controller_name' => 'SaisieFicheController',
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/etat_civil", name="saisie_fiche_etat_civil")
     */
    public function EtatCivil(): Response
    {
        return $this->render('saisie_fiche/etat_civil.html.twig', [
            'controller_name' => 'SaisieFicheController',
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/epoux", name="saisie_fiche_epoux")
     */
    public function Epoux(): Response
    {
        return $this->render('saisie_fiche/epoux.html.twig', [
            'controller_name' => 'SaisieFicheController',
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/enfant", name="saisie_fiche_enfant")
     */
    public function Enfant(): Response
    {
        return $this->render('saisie_fiche/enfant.html.twig', [
            'controller_name' => 'SaisieFicheController',
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/affectation", name="saisie_fiche_affectation")
     */
    public function Affectation(): Response
    {
        return $this->render('saisie_fiche/affectation.html.twig', [
            'controller_name' => 'SaisieFicheController',
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/nomination", name="saisie_fiche_nomination")
     */
    public function Nomination(): Response
    {
        return $this->render('saisie_fiche/nomination.html.twig', [
            'controller_name' => 'SaisieFicheController',
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/recompense", name="saisie_fiche_recompense")
     */
    public function Recompense(): Response
    {
        return $this->render('saisie_fiche/recompense.html.twig', [
            'controller_name' => 'SaisieFicheController',
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/punition", name="saisie_fiche_punition")
     */
    public function Punition(): Response
    {
        return $this->render('saisie_fiche/punition.html.twig', [
            'controller_name' => 'SaisieFicheController',
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/decoration", name="saisie_fiche_decoration")
     */
    public function Decoration(): Response
    {
        return $this->render('saisie_fiche/decoration.html.twig', [
            'controller_name' => 'SaisieFicheController',
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/diplome", name="saisie_fiche_diplome")
     */
    public function Diplome(): Response
    {
        return $this->render('saisie_fiche/diplome.html.twig', [
            'controller_name' => 'SaisieFicheController',
        ]);
    }
}
