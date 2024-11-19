<?php

namespace App\Controller;

use App\Entity\Proche;
use App\Form\ProcheType;
use App\Repository\ProcheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/proche")
 */
class ProcheController extends AbstractController
{
    /**
     * @Route("/", name="proche_index", methods={"GET"})
     */
    public function index(ProcheRepository $procheRepository): Response
    {
        return $this->render('proche/index.html.twig', [
            'proches' => $procheRepository->findBy([], ["id" => "DESC"]),
        ]);
    }

    /**
     * @Route("/new", name="proche_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $proche = new Proche();
        $form = $this->createForm(ProcheType::class, $proche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($proche);
            $entityManager->flush();
            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');

            return $this->redirectToRoute('proche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('proche/new.html.twig', [
            'proche' => $proche,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proche_show", methods={"GET"})
     */
    public function show(Proche $proche): Response
    {
        return $this->render('proche/show.html.twig', [
            'proche' => $proche,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="proche_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Proche $proche): Response
    {
        $form = $this->createForm(ProcheType::class, $proche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La modification a été effectuée avec succès.');

            return $this->redirectToRoute('proche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('proche/edit.html.twig', [
            'proche' => $proche,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proche_delete", methods={"POST"})
     */
    public function delete(Request $request, Proche $proche): Response
    {
        if ($this->isCsrfTokenValid('delete'.$proche->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($proche);
            $entityManager->flush();
            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('proche_index', [], Response::HTTP_SEE_OTHER);
    }
}
