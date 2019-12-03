<?php

namespace App\Controller;

use App\Entity\NominationsPersonnels;
use App\Form\NominationsPersonnelsType;
use App\Repository\NominationsPersonnelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/nominations/personnels")
 */
class NominationsPersonnelsController extends AbstractController
{
    /**
     * @Route("/", name="nominations_personnels_index", methods={"GET"})
     */
    public function index(NominationsPersonnelsRepository $nominationsPersonnelsRepository): Response
    {
        return $this->render('nominations_personnels/index.html.twig', [
            'nominations_personnels' => $nominationsPersonnelsRepository->findAll(),
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
        }

        return $this->redirectToRoute('nominations_personnels_index');
    }
}
