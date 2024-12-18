<?php

namespace App\Controller;

use App\Entity\NiveauDiplome;
use App\Form\NiveauDiplomeType;
use App\Repository\NiveauDiplomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/niveau/diplome")
 */
class NiveauDiplomeController extends AbstractController
{
    /**
     * @Route("/", name="niveau_diplome_index", methods={"GET"})
     */
    public function index(NiveauDiplomeRepository $niveauDiplomeRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('niveau_diplome/index.html.twig', [
            'niveau_diplomes' => $niveauDiplomeRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="niveau_diplome_recherche", methods={"GET"})
     */
    public function recherche(NiveauDiplomeRepository $niveauDiplomeRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $niveauDiplomeRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('niveau_diplome/index.html.twig', [
            'niveau_diplomes' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="niveau_diplome_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $niveauDiplome = new NiveauDiplome();
        $form = $this->createForm(NiveauDiplomeType::class, $niveauDiplome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($niveauDiplome);
            $entityManager->flush();

            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');

            return $this->redirectToRoute('niveau_diplome_index');
        }

        return $this->render('niveau_diplome/new.html.twig', [
            'niveau_diplome' => $niveauDiplome,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="niveau_diplome_show", methods={"GET"})
     */
    public function show(NiveauDiplome $niveauDiplome): Response
    {
        return $this->render('niveau_diplome/show.html.twig', [
            'niveau_diplome' => $niveauDiplome,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="niveau_diplome_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, NiveauDiplome $niveauDiplome): Response
    {
        $form = $this->createForm(NiveauDiplomeType::class, $niveauDiplome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'La modification a été effectuée avec succès.');

            return $this->redirectToRoute('niveau_diplome_index');
        }

        return $this->render('niveau_diplome/edit.html.twig', [
            'niveau_diplome' => $niveauDiplome,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="niveau_diplome_delete", methods={"DELETE"})
     */
    public function delete(Request $request, NiveauDiplome $niveauDiplome): Response
    {
        if ($this->isCsrfTokenValid('delete'.$niveauDiplome->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($niveauDiplome);
            $entityManager->flush();

            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('niveau_diplome_index');
    }
}
