<?php

namespace App\Controller;

use App\Entity\RadiationsPersonnels;
use App\Form\RadiationsPersonnelsType;
use App\Repository\RadiationsPersonnelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/radiations/personnels")
 */
class RadiationsPersonnelsController extends AbstractController
{
    /**
     * @Route("/", name="radiations_personnels_index", methods={"GET"})
     */
    public function index(RadiationsPersonnelsRepository $radiationsPersonnelsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('radiations_personnels/index.html.twig', [
            'radiations_personnels' => $radiationsPersonnelsRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="radiations_personnels_recherche", methods={"GET"})
     */
    public function recherche(RadiationsPersonnelsRepository $radiationsPersonnelsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $radiationsPersonnelsRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('radiations_personnels/index.html.twig', [
            'radiations_personnels' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="radiations_personnels_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $radiationsPersonnel = new RadiationsPersonnels();
        $form = $this->createForm(RadiationsPersonnelsType::class, $radiationsPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($radiationsPersonnel);
            $entityManager->flush();
            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');
            return $this->redirectToRoute('radiations_personnels_index');
        }

        return $this->render('radiations_personnels/new.html.twig', [
            'radiations_personnel' => $radiationsPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="radiations_personnels_show", methods={"GET"})
     */
    public function show(RadiationsPersonnels $radiationsPersonnel): Response
    {
        return $this->render('radiations_personnels/show.html.twig', [
            'radiations_personnel' => $radiationsPersonnel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="radiations_personnels_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RadiationsPersonnels $radiationsPersonnel): Response
    {
        $form = $this->createForm(RadiationsPersonnelsType::class, $radiationsPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La modification a été effectuée avec succès.');
            return $this->redirectToRoute('radiations_personnels_index');
        }

        return $this->render('radiations_personnels/edit.html.twig', [
            'radiations_personnel' => $radiationsPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="radiations_personnels_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RadiationsPersonnels $radiationsPersonnel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$radiationsPersonnel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($radiationsPersonnel);
            $entityManager->flush();
            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('radiations_personnels_index');
    }
}
