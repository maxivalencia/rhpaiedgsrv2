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
/**
 * @Route("/personnelsactifs")
 */
class PersonnelsController extends AbstractController
{
    /**
     * @Route("/", name="personnels_index", methods={"GET"})
     */
    public function index(PersonnelsRepository $personnelsRepository, PhotosRepository $photosRepository, Request $request, PaginatorInterface $paginator): Response
    {       
        return $this->render('personnels/index.html.twig', [
            'personnels' => $personnelsRepository->findBy(["actif" => 1], ["id" => "DESC"]),
            'photos' => $photosRepository->findAll(),
        ]);
    }
    
    /**
     * @Route("/recherche", name="personnels_recherche", methods={"GET"})
     */
    public function recherche(PersonnelsRepository $personnelsRepository, PhotosRepository $photosRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $personnelsRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );        
        return $this->render('personnels/index.html.twig', [
            'personnels' => $pagination,
            'photos' => $photosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="personnels_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $personnel = new Personnels();
        $form = $this->createForm(PersonnelsType::class, $personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($personnel);
            $entityManager->flush();

            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');

            return $this->redirectToRoute('personnels_index');
        }

        return $this->render('personnels/new.html.twig', [
            'personnel' => $personnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personnels_show", methods={"GET"})
     */
    public function show(Personnels $personnel, RecompenseRepository $recompenseRepository, SituationSanitaireRepository $situationSanitaireRepository, FonctionsConjointsRepository $fonctionsConjointsRepository, PhotosRepository $photosRepository, ConjointsRepository $conjointsRepository, EnfantsRepository $enfantsRepository, DiplomesPersonnelsRepository $diplomesPersonnelsRepository, DecorationsPersonnelsRepository $decorationsPersonnelsRepository, AffectationsPersonnelsRepository $affectationsPersonnelsRepository, NominationsPersonnelsRepository $nominationsPersonnelsRepository): Response
    {
        $photo = $photosRepository->findOneBy(['personnel' => $personnel]);
        if($photo == null){
            $photo = new Photos();
            $photo->setPhoto("default.png");
        }
        $sary = $this->getParameter('photo').$photo;
        // Ouvrir le fichier
        $check = @fopen($sary, 'r');
        // Vérifier si le fichier existe
        if(!$check){
            $sary = "default.png";
        }else{
            $sary = $photo->getPhoto();
        }
        $conjoints = $conjointsRepository->findBy(['personnel' => $personnel], ["id" => "DESC"]);
        //$conjoints = $conjointsRepository->findOneBy(['personnel' => $personnel], ["id" => "DESC"]);
        //$conjoint = $conjointsRepository->findOneBy(["personnel" => $personnel], ["id" => "DESC"]);
        //$fonctionConjoint = $fonctionsConjointsRepository->findOneBy(["conjoint" => $personnel], ["id" => "DESC"]);
        //$fonctionConjoint = $fonctionsConjointsRepository->findOneBy(["conjoint" => $conjoints]);
        $fonctionConjoint = $fonctionsConjointsRepository->findAll();
        $enfants = $enfantsRepository->findBy(["personnel" => $personnel], ["date_naissance" => "ASC"]);
        $diplomes = $diplomesPersonnelsRepository->findBy(["personnel" => $personnel], ["date" => "DESC"]);
        $decorations = $decorationsPersonnelsRepository->findBy(["personnel" => $personnel], ["date" => "DESC"]);
        $affectations = $affectationsPersonnelsRepository->findBy(["personnel" => $personnel], ["date_affectation" => "DESC"]);
        $nominations = $nominationsPersonnelsRepository->findBy(["personnel" => $personnel], ["date_nomination" => "DESC"]);
        $situationSanitaires = $situationSanitaireRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $recompenses = $recompenseRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        return $this->render('personnels/show.html.twig', [
            'personnel' => $personnel,
            'photo' => $photo,
            'sary' => $sary,
            'conjoints' => $conjoints,
            'enfants' => $enfants,
            'diplomes' => $diplomes,
            'decorations' => $decorations,
            'affectations' => $affectations,
            'nominations' => $nominations,
            'fonctionConjoints' => $fonctionConjoint,
            'situationSanitaires' => $situationSanitaires,
            'recompenses' => $recompenses,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="personnels_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Personnels $personnel): Response
    {
        $form = $this->createForm(PersonnelsType::class, $personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'La modification a été effectuée avec succès.');

            return $this->redirectToRoute('personnels_index');
        }

        return $this->render('personnels/edit.html.twig', [
            'personnel' => $personnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personnels_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Personnels $personnel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personnel->getId(), $request->request->get('_token'))) {
            $personnel->setActif(false);
            $entityManager = $this->getDoctrine()->getManager();
            //$entityManager->remove($personnel);
            $entityManager->flush();

            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('personnels_index');
    }
}
