<?php

namespace App\Controller;

use App\Entity\AffectationsPersonnels;
use App\Entity\Conjoints;
use App\Entity\Enfants;
use App\Entity\FonctionsConjoints;
use App\Entity\Personnels;
use App\Entity\Photos;
use App\Entity\SituationSanitaire;
use App\Form\PersonnelsType;
use App\Form\ConsultationCentreType;
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
use App\Repository\UnitesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Common\Collections\ArrayCollection;

class ConsultationCentreController extends AbstractController
{
    /**
     * @Route("/consultation/centre", name="consultation_centre")
     */
    public function index(Request $request, SituationSanitaireRepository $situationSanitaireRepository, EnfantsRepository $enfantsRepository, FonctionsConjointsRepository $fonctionsConjointsRepository, ConjointsRepository $conjointsRepository, PersonnelsRepository $personnelsRepository, PhotosRepository $photosRepository, AffectationsPersonnelsRepository $affectationsPersonnelsRepository, UnitesRepository $unitesRepository): Response
    {      
        $unitesListe = $unitesRepository->findAll([], ["id" => "DESC"]);  
        $unites = new ArrayCollection();      
        foreach($unitesListe as $unit){
            $unites->add([$unit->__toString() => $unit->getId()]);
        } 

        $form = $this->createFormBuilder()
        ->add('Unites', ChoiceType::class, [
            'label' => 'Sélection des Unités',
            'multiple' => true,
            'choices' => $unites,
            'required' => false,
            'empty_data' => '',
            'attr' => [
                'id' => 'Unites',
                'name' => 'Unites',
            ],
        ])
        ->add('Afficher', SubmitType::class, array('label' => 'Afficher les personnels'))
        ->getForm();

        //$liste_unites = new ArrayCollection();
        $liste_personnels = new ArrayCollection();
        $liste_affectations = new ArrayCollection();

        $liste_conjoints[] = new Conjoints();
        $liste_fonction_conjoints[] = new FonctionsConjoints();
        $liste_affectations[] = new AffectationsPersonnels();
        $liste_enfants[] = new Enfants();
        $liste_situations_sanitaires[] = new SituationSanitaire();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $liste[] = $request->request->get("form");
            $listes[] = $liste[0]["Unites"];
            ////
            return $this->render('consultation_personnel_civil/index.html.twig', [
                'controller_name' => 'ConsultationCentreController',
            ]);
            ////
            foreach($listes[0] as $lst){    
                $liste_unite = $unitesRepository->findOneBy(["id" => $lst]);
                $liste_affectation = $affectationsPersonnelsRepository->findBy(["unite" => $liste_unite->getId()], ["date_disponibilite" => "DESC"]);
                if($liste_affectation != null) {
                    foreach($liste_affectation as $la) {
                        $pers = $personnelsRepository->findOneBy(["id" =>  $la->getPersonnel()->getId()]);
                        if($pers != null) {
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
            }
        }else{
            $listes = $personnelsRepository->findAll();
            foreach($listes as $lst){
                //$pers = $personnelsRepository->findBy(["id" =>  $lst->getId()]);
                if($lst != NULL){ 
                    $liste_personnels->add($lst);
                    // $liste_affectations->add($affectationsPersonnelsRepository->findBy([], ["date_affectation" => "DESC"]));
                    $conjoint = $conjointsRepository->findBy(['personnel' => $lst], ["id" => "DESC"]);
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

        return $this->render('consultation_centre/index.html.twig', [
            'controller_name' => 'ConsultationCentreController',
            'form' => $form->createView(),
            'personnels' => $liste_personnels,
            'photos' => $photosRepository->findAll(),
            'affectations' => $liste_affectations,
            'fonctionConjoints' => $liste_fonction_conjoints,
            'conjoints' => $liste_conjoints,
            'enfants' => $liste_enfants,
            'situationsSanitaires' => $liste_situations_sanitaires,
        ]);

        /* return $this->render('consultation_centre/index.html.twig', [                                                                                                                                                                                                                                                                                                                                                                                 /index.html.twig', [
            'controller_name' => 'ConsultationCentreController',
            'form' => $form->createView(),
            'personnels' => $liste_personnels,
            'photos' => $photosRepository->findAll(),
            'affectations' => $liste_affectations,
            'fonctionConjoints' => $liste_fonction_conjoints,
            'conjoints' => $liste_conjoints,
            'enfants' => $liste_enfants,
            'situationsSanitaires' => $liste_situations_sanitaires,
        ]); */

        /* return $this->render('consultation_centre/index.html.twig', [
            'controller_name' => 'ConsultationCentreController',
        ]); */
    }
}
