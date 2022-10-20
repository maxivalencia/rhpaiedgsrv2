<?php

namespace App\Controller;

use App\Entity\Personnels;
use App\Form\PersonnelsType;
use App\Entity\Conjoints;
use App\Form\ConjointsType;
use App\Entity\Enfants;
use App\Form\EnfantsType;
use App\Entity\AffectationsPersonnels;
use App\Form\AffectationsPersonnelsType;
use App\Entity\NominationsPersonnels;
use App\Form\NominationsPersonnelsType;
use App\Entity\Recompense;
use App\Form\RecompenseType;
use App\Entity\Punitions;
use App\Form\PunitionsType;
use App\Entity\DecorationsPersonnels;
use App\Form\DecorationsPersonnelsType;
use App\Entity\DiplomesPersonnels;
use App\Form\DiplomesPersonnelsType;
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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function EtatCivil(Request $request): Response
    {
        $personnel = new Personnels();
        $form = $this->createForm(PersonnelsType::class, $personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($personnel);
            $entityManager->flush();

            return $this->redirectToRoute('saisie_fiche_epoux');
        }

        return $this->render('saisie_fiche/etat_civil.html.twig', [
            'personnel' => $personnel,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/epoux", name="saisie_fiche_epoux")
     */
    public function Epoux(Request $request): Response
    {
        $conjoint = new Conjoints();
        $form = $this->createForm(ConjointsType::class, $conjoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if($conjoint->getReferenceAutorisationMariage() == null){
                $conjoint->setReferenceAutorisationMariage("Non Assigné");
            }
            if($conjoint->getReferenceOfficielMariage() == null){
                $conjoint->setReferenceOfficielMariage("Non Assigné");
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($conjoint);
            $entityManager->flush();

            return $this->redirectToRoute('saisie_fiche_enfant');
        }

        return $this->render('saisie_fiche/epoux.html.twig', [
            'conjoint' => $conjoint,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/enfant", name="saisie_fiche_enfant")
     */
    public function Enfant(Request $request): Response
    {
        $enfant = new Enfants();
        $form = $this->createForm(EnfantsType::class, $enfant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($enfant);
            $entityManager->flush();

            return $this->redirectToRoute('saisie_fiche_enfant');
        }

        return $this->render('saisie_fiche/enfant.html.twig', [
            'enfant' => $enfant,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/affectation", name="saisie_fiche_affectation")
     */
    public function Affectation(Request $request): Response
    {
        $affectationsPersonnel = new AffectationsPersonnels();
        $form = $this->createForm(AffectationsPersonnelsType::class, $affectationsPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($affectationsPersonnel);
            $entityManager->flush();

            return $this->redirectToRoute('saisie_fiche_affectation');
        }

        return $this->render('saisie_fiche/affectation.html.twig', [
            'affectations_personnel' => $affectationsPersonnel,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/nomination", name="saisie_fiche_nomination")
     */
    public function Nomination(Request $request): Response
    {
        $nominationsPersonnel = new NominationsPersonnels();
        $form = $this->createForm(NominationsPersonnelsType::class, $nominationsPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($nominationsPersonnel);
            $entityManager->flush();

            return $this->redirectToRoute('saisie_fiche_nomination');
        }

        return $this->render('saisie_fiche/nomination.html.twig', [
            'nominations_personnel' => $nominationsPersonnel,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/recompense", name="saisie_fiche_recompense")
     */
    public function Recompense(Request $request): Response
    {
        $recompense = new Recompense();
        $form = $this->createForm(RecompenseType::class, $recompense);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recompense);
            $entityManager->flush();

            return $this->redirectToRoute('recompense_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('saisie_fiche/recompense.html.twig', [
            'recompense' => $recompense,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/punition", name="saisie_fiche_punition")
     */
    public function Punition(Request $request): Response
    {
        $punition = new Punitions();
        $form = $this->createForm(PunitionsType::class, $punition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($punition);
            $entityManager->flush();

            return $this->redirectToRoute('saisie_fiche_punition');
        }

        return $this->render('saisie_fiche/punition.html.twig', [
            'punition' => $punition,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/decoration", name="saisie_fiche_decoration")
     */
    public function Decoration(Request $request): Response
    {
        $decorationsPersonnel = new DecorationsPersonnels();
        $form = $this->createForm(DecorationsPersonnelsType::class, $decorationsPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($decorationsPersonnel);
            $entityManager->flush();

            return $this->redirectToRoute('saisie_fiche_decoration');
        }

        return $this->render('saisie_fiche/decoration.html.twig', [
            'decorations_personnel' => $decorationsPersonnel,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/saisie/fiche/diplome", name="saisie_fiche_diplome")
     */
    public function Diplome(Request $request): Response
    {
        $diplomesPersonnel = new DiplomesPersonnels();
        $form = $this->createForm(DiplomesPersonnelsType::class, $diplomesPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($diplomesPersonnel);
            $entityManager->flush();

            return $this->redirectToRoute('saisie_fiche_diplome');
        }

        return $this->render('saisie_fiche/diplome.html.twig', [
            'diplomes_personnel' => $diplomesPersonnel,
            'form' => $form->createView(),
        ]);
    }
}
