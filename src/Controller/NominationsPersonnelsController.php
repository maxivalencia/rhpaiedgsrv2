<?php

namespace App\Controller;

use App\Entity\NominationsPersonnels;
use App\Form\NominationsPersonnelsType;
use App\Repository\NominationsPersonnelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/nominations/personnels")
 */
class NominationsPersonnelsController extends AbstractController
{
    /**
     * @Route("/", name="nominations_personnels_index", methods={"GET"})
     */
    public function index(NominationsPersonnelsRepository $nominationsPersonnelsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('nominations_personnels/index.html.twig', [
            'nominations_personnels' => $nominationsPersonnelsRepository->findBy([], ["date_nomination" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="nominations_personnels_recherche", methods={"GET"})
     */
    public function recherche(NominationsPersonnelsRepository $nominationsPersonnelsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $nominationsPersonnelsRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('nominations_personnels/index.html.twig', [
            'nominations_personnels' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="nominations_personnels_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $nominationsPersonnel = new NominationsPersonnels();
        $form = $this->createForm(NominationsPersonnelsType::class, $nominationsPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($nominationsPersonnel);
            $entityManager->flush();

            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');

            return $this->redirectToRoute('nominations_personnels_index');
        }

        return $this->render('nominations_personnels/new.html.twig', [
            'nominations_personnel' => $nominationsPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nominations_personnels_show", methods={"GET"})
     */
    public function show(NominationsPersonnels $nominationsPersonnel): Response
    {
        return $this->render('nominations_personnels/show.html.twig', [
            'nominations_personnel' => $nominationsPersonnel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="nominations_personnels_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, NominationsPersonnels $nominationsPersonnel): Response
    {
        $form = $this->createForm(NominationsPersonnelsType::class, $nominationsPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'La modification a été effectuée avec succès.');

            return $this->redirectToRoute('nominations_personnels_index');
        }

        return $this->render('nominations_personnels/edit.html.twig', [
            'nominations_personnel' => $nominationsPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nominations_personnels_delete", methods={"DELETE"})
     */
    public function delete(Request $request, NominationsPersonnels $nominationsPersonnel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nominationsPersonnel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($nominationsPersonnel);
            $entityManager->flush();
            
            $this->addFlash('success', 'La suppression a été effectuée avec succès.');

        }

        return $this->redirectToRoute('nominations_personnels_index');
    }
}
