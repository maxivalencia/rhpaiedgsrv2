<?php

namespace App\Controller;

use App\Entity\RadiationsPersonnels;
use App\Form\RadiationsPersonnelsType;
use App\Repository\RadiationsPersonnelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/radiations/personnels")
 */
class RadiationsPersonnelsController extends AbstractController
{
    /**
     * @Route("/", name="radiations_personnels_index", methods={"GET"})
     */
    public function index(RadiationsPersonnelsRepository $radiationsPersonnelsRepository): Response
    {
        return $this->render('radiations_personnels/index.html.twig', [
            'radiations_personnels' => $radiationsPersonnelsRepository->findAll(),
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
        }

        return $this->redirectToRoute('radiations_personnels_index');
    }
}
