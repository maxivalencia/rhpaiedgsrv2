<?php

namespace App\Controller;

use App\Entity\DecorationsPersonnels;
use App\Form\DecorationsPersonnelsType;
use App\Repository\DecorationsPersonnelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/decorationspersonnels")
 */
class DecorationsPersonnelsController extends AbstractController
{
    /**
     * @Route("/", name="decorations_personnels_index", methods={"GET"})
     */
    public function index(DecorationsPersonnelsRepository $decorationsPersonnelsRepository): Response
    {
        return $this->render('decorations_personnels/index.html.twig', [
            'decorations_personnels' => $decorationsPersonnelsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="decorations_personnels_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $decorationsPersonnel = new DecorationsPersonnels();
        $form = $this->createForm(DecorationsPersonnelsType::class, $decorationsPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($decorationsPersonnel);
            $entityManager->flush();

            return $this->redirectToRoute('decorations_personnels_index');
        }

        return $this->render('decorations_personnels/new.html.twig', [
            'decorations_personnel' => $decorationsPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decorations_personnels_show", methods={"GET"})
     */
    public function show(DecorationsPersonnels $decorationsPersonnel): Response
    {
        return $this->render('decorations_personnels/show.html.twig', [
            'decorations_personnel' => $decorationsPersonnel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="decorations_personnels_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DecorationsPersonnels $decorationsPersonnel): Response
    {
        $form = $this->createForm(DecorationsPersonnelsType::class, $decorationsPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('decorations_personnels_index');
        }

        return $this->render('decorations_personnels/edit.html.twig', [
            'decorations_personnel' => $decorationsPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decorations_personnels_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DecorationsPersonnels $decorationsPersonnel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$decorationsPersonnel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($decorationsPersonnel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('decorations_personnels_index');
    }
}
