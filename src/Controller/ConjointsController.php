<?php

namespace App\Controller;

use App\Entity\Conjoints;
use App\Form\ConjointsType;
use App\Repository\ConjointsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/conjoints")
 */
class ConjointsController extends AbstractController
{
    /**
     * @Route("/", name="conjoints_index", methods={"GET"})
     */
    public function index(ConjointsRepository $conjointsRepository): Response
    {
        return $this->render('conjoints/index.html.twig', [
            'conjoints' => $conjointsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="conjoints_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $conjoint = new Conjoints();
        $form = $this->createForm(ConjointsType::class, $conjoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($conjoint);
            $entityManager->flush();

            return $this->redirectToRoute('conjoints_index');
        }

        return $this->render('conjoints/new.html.twig', [
            'conjoint' => $conjoint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="conjoints_show", methods={"GET"})
     */
    public function show(Conjoints $conjoint): Response
    {
        return $this->render('conjoints/show.html.twig', [
            'conjoint' => $conjoint,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="conjoints_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Conjoints $conjoint): Response
    {
        $form = $this->createForm(ConjointsType::class, $conjoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('conjoints_index');
        }

        return $this->render('conjoints/edit.html.twig', [
            'conjoint' => $conjoint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="conjoints_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Conjoints $conjoint): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conjoint->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($conjoint);
            $entityManager->flush();
        }

        return $this->redirectToRoute('conjoints_index');
    }
}
