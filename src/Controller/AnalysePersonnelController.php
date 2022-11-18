<?php

namespace App\Controller;

use App\Entity\AffectationsPersonnels;
use App\Entity\Conjoints;
use App\Entity\Enfants;
use App\Entity\FonctionsConjoints;
use App\Entity\Personnels;
use App\Form\PersonnelsType;
use App\Form\AnalyseType;
use App\Entity\SituationSanitaire;
use App\Repository\PersonnelsRepository;
use App\Repository\PhotosRepository;
use App\Repository\SituationSanitaireRepository;
use App\Repository\NominationsPersonnelsRepository;
use App\Repository\FonctionsConjointsRepository;
use App\Repository\EnfantsRepository;
use App\Repository\DiplomesPersonnelsRepository;
use App\Repository\DecorationsPersonnelsRepository;
use App\Repository\AffectationsPersonnelsRepository;
use App\Repository\ConjointsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Collections\ArrayCollection;

class AnalysePersonnelController extends AbstractController
{
    /**
     * @Route("/analyse", name="analyse_personnel", methods={"GET","POST"})
     */
    public function index(Request $request, SituationSanitaireRepository $situationSanitaireRepository, EnfantsRepository $enfantsRepository, FonctionsConjointsRepository $fonctionsConjointsRepository, ConjointsRepository $conjointsRepository, PersonnelsRepository $personnelsRepository, PhotosRepository $photosRepository, AffectationsPersonnelsRepository $affectationsPersonnelsRepository): Response
    {
        $personnelsListe = $personnelsRepository->findBy(["actif" => 1], ["id" => "DESC"]);
        $personnels = new ArrayCollection();
        foreach($personnelsListe as $pers){
            $personnels->add([$pers->__toString() => $pers->getId()]);
        }

        $form = $this->createFormBuilder()
        ->add('Personnels', ChoiceType::class, [
            'label' => 'Sélection des personnels',
            'multiple' => true,
            'choices' => $personnels,
            'required' => false,
            'empty_data' => '',
            'attr' => [
                'id' => 'Personnels',
                'name' => 'Personnels',
            ],
        ])
        ->add('Afficher', SubmitType::class, array('label' => 'Afficher les données'))
        ->getForm();
        
        $form->handleRequest($request);

        $liste_personnels = new ArrayCollection();
        $liste_affectations = new ArrayCollection();
        //$liste_conjoints = new ArrayCollection();
        //$liste_fonction_conjoints = new ArrayCollection();
        $liste_conjoints[] = new Conjoints();
        $liste_fonction_conjoints[] = new FonctionsConjoints();
        $liste_affectations[] = new AffectationsPersonnels();
        $liste_enfants[] = new Enfants();
        $liste_situations_sanitaires[] = new SituationSanitaire();
        if ($form->isSubmitted() && $form->isValid()) {
            $liste[] = $request->request->get("form");
            $listes[] = $liste[0]["Personnels"];
            foreach($listes[0] as $lst){
                $pers = $personnelsRepository->findOneBy(["id" =>  $lst]);
                if($pers != NULL){ 
                    $liste_personnels->add($pers);
                    // $liste_affectations->add($affectationsPersonnelsRepository->findBy([], ["date_affectation" => "DESC"]));
                    $conjoint = $conjointsRepository->findBy(['personnel' => $pers], ["id" => "DESC"]);
                    //var_dump($conjoint);
                    /* $liste_fonction_conjoints->add($fonctionsConjointsRepository->findBy(['conjoint' => $conjoint], ["id" => "DESC"]));
                    $liste_conjoints->add($conjoint); */
                    // $liste_fonction_conjoints = $fonctionsConjointsRepository->findBy(['conjoint' => $conjointsRepository->findOneBy(['personnel' => $pers], ["id" => "DESC"])], ["id" => "DESC"]);
                    $liste_fonction_conjoints = $fonctionsConjointsRepository->findBy([], ["id" => "DESC"]);
                    // $liste_conjoints = $conjoint;
                    $liste_conjoints = $conjointsRepository->findBy([], ["id" => "DESC"]);
                    $liste_affectations = $affectationsPersonnelsRepository->findBy([], ["date_affectation" => "DESC"]);
                    $liste_enfants = $enfantsRepository->findAll();
                    $liste_situations_sanitaires = $situationSanitaireRepository->findAll();
                }
            }
        }

        return $this->render('analyse_personnel/index.html.twig', [
            'controller_name' => 'AnalysePersonnelController',
            'form' => $form->createView(),
            'personnels' => $liste_personnels,
            'photos' => $photosRepository->findAll(),
            'affectations' => $liste_affectations,
            'fonctionConjoints' => $liste_fonction_conjoints,
            'conjoints' => $liste_conjoints,
            'enfants' => $liste_enfants,
            'situationsSanitaires' => $liste_situations_sanitaires,
        ]);
    }
}
