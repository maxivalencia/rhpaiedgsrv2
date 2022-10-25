<?php

namespace App\Controller;

use App\Entity\Personnels;
use App\Form\PersonnelsType;
use App\Form\AnalyseType;
use App\Repository\PersonnelsRepository;
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
     * @Route("/analyse/personnel", name="analyse_personnel", methods={"GET","POST"})
     */
    public function index(Request $request, PersonnelsRepository $personnelsRepository/* , Personnels $personnel */): Response
    {
        //$form = $this->createForm(AnalyseType::class);  
        /* $form = $this->createFormBuilder($ticket)
        ->add('category', ChoiceType::class, array(
            'choices' => array(
                'ROMAC eHR' => 1,
                'ROMAC Website' => 2,
                'ROMAC Guide' => 3,
            )
        ))
        ->add('comment', TextareaType::class)
        ->add('save', SubmitType::class, array('label' => 'Submit Ticket'))
        ->getForm(); */
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
        ])
        ->add('Afficher', SubmitType::class, array('label' => 'Afficher les données des personnels'))
        ->getForm();
        
        $form->handleRequest($request);

        $liste_personnels = new ArrayCollection();
        if ($form->isSubmitted() && $form->isValid()) {
            $listes[] = $request->request->get("personnels");
            foreach($listes as $lst){
                $pers = $personnelsRepository->findOneBy(["id" => $lst]);
                if($pers != NULL){ 
                    $liste_personnels->add($pers);
                }
            }
        }

        return $this->render('analyse_personnel/index.html.twig', [
            'controller_name' => 'AnalysePersonnelController',
            'form' => $form->createView(),
            'personnels' => $liste_personnels,
        ]);
    }
}
