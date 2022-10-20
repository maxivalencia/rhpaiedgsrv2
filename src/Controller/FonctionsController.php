<?php

namespace App\Controller;

use App\Entity\Fonctions;
use App\Form\FonctionsType;
use App\Repository\FonctionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/fonctions")
 */
class FonctionsController extends AbstractController
{
    /**
     * @Route("/", name="fonctions_index", methods={"GET"})
     */
    public function index(FonctionsRepository $fonctionsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('fonctions/index.html.twig', [
            'fonctions' => $fonctionsRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="fonctions_recherche", methods={"GET"})
     */
    public function recherche(FonctionsRepository $fonctionsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $fonctionsRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('fonctions/index.html.twig', [
            'fonctions' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="fonctions_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fonction = new Fonctions();
        $form = $this->createForm(FonctionsType::class, $fonction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fonction);
            $entityManager->flush();

            return $this->redirectToRoute('fonctions_index');
        }

        return $this->render('fonctions/new.html.twig', [
            'fonction' => $fonction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fonctions_show", methods={"GET"})
     */
    public function show(Fonctions $fonction): Response
    {
        return $this->render('fonctions/show.html.twig', [
            'fonction' => $fonction,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fonctions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fonctions $fonction): Response
    {
        $form = $this->createForm(FonctionsType::class, $fonction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fonctions_index');
        }

        return $this->render('fonctions/edit.html.twig', [
            'fonction' => $fonction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fonctions_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fonctions $fonction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fonction->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fonction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fonctions_index');
    }
}
