<?php

namespace App\Controller;

use App\Entity\Reintegration;
use App\Form\ReintegrationType;
use App\Repository\ReintegrationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reintegration")
 */
class ReintegrationController extends AbstractController
{
    /**
     * @Route("/", name="reintegration_index", methods={"GET"})
     */
    public function index(ReintegrationRepository $reintegrationRepository): Response
    {
        return $this->render('reintegration/index.html.twig', [
            'reintegrations' => $reintegrationRepository->findBy([], ["id" => "DESC"]),
        ]);
    }

    /**
     * @Route("/new", name="reintegration_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reintegration = new Reintegration();
        $form = $this->createForm(ReintegrationType::class, $reintegration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reintegration);
            $entityManager->flush();
            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');
            return $this->redirectToRoute('reintegration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reintegration/new.html.twig', [
            'reintegration' => $reintegration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reintegration_show", methods={"GET"})
     */
    public function show(Reintegration $reintegration): Response
    {
        return $this->render('reintegration/show.html.twig', [
            'reintegration' => $reintegration,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reintegration_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reintegration $reintegration): Response
    {
        $form = $this->createForm(ReintegrationType::class, $reintegration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La modification a été effectuée avec succès.');
            return $this->redirectToRoute('reintegration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reintegration/edit.html.twig', [
            'reintegration' => $reintegration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reintegration_delete", methods={"POST"})
     */
    public function delete(Request $request, Reintegration $reintegration): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reintegration->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reintegration);
            $entityManager->flush();
            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('reintegration_index', [], Response::HTTP_SEE_OTHER);
    }
}
