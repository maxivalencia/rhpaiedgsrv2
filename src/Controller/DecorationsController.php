<?php

namespace App\Controller;

use App\Entity\Decorations;
use App\Form\DecorationsType;
use App\Repository\DecorationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/decorations")
 */
class DecorationsController extends AbstractController
{
    /**
     * @Route("/index/", name="decorations_index", methods={"GET"})
     */
    public function index(DecorationsRepository $decorationsRepository): Response
    {
        return $this->render('decorations/index.html.twig', [
            'decorations' => $decorationsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="decorations_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $decoration = new Decorations();
        $form = $this->createForm(DecorationsType::class, $decoration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($decoration);
            $entityManager->flush();

            return $this->redirectToRoute('decorations_index');
        }

        return $this->render('decorations/new.html.twig', [
            'decoration' => $decoration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decorations_show", methods={"GET"})
     */
    public function show(Decorations $decoration): Response
    {
        return $this->render('decorations/show.html.twig', [
            'decoration' => $decoration,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="decorations_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Decorations $decoration): Response
    {
        $form = $this->createForm(DecorationsType::class, $decoration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('decorations_index');
        }

        return $this->render('decorations/edit.html.twig', [
            'decoration' => $decoration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decorations_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Decorations $decoration): Response
    {
        if ($this->isCsrfTokenValid('delete'.$decoration->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($decoration);
            $entityManager->flush();
        }

        return $this->redirectToRoute('decorations_index');
    }
}
