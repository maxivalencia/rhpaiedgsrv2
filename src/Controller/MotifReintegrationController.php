<?php

namespace App\Controller;

use App\Entity\MotifReintegration;
use App\Form\MotifReintegrationType;
use App\Repository\MotifReintegrationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/motif/reintegration")
 */
class MotifReintegrationController extends AbstractController
{
    /**
     * @Route("/", name="motif_reintegration_index", methods={"GET"})
     */
    public function index(MotifReintegrationRepository $motifReintegrationRepository): Response
    {
        return $this->render('motif_reintegration/index.html.twig', [
            'motif_reintegrations' => $motifReintegrationRepository->findBy([], ["id" => "DESC"]),
        ]);
    }

    /**
     * @Route("/new", name="motif_reintegration_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $motifReintegration = new MotifReintegration();
        $form = $this->createForm(MotifReintegrationType::class, $motifReintegration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($motifReintegration);
            $entityManager->flush();

            return $this->redirectToRoute('motif_reintegration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('motif_reintegration/new.html.twig', [
            'motif_reintegration' => $motifReintegration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="motif_reintegration_show", methods={"GET"})
     */
    public function show(MotifReintegration $motifReintegration): Response
    {
        return $this->render('motif_reintegration/show.html.twig', [
            'motif_reintegration' => $motifReintegration,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="motif_reintegration_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MotifReintegration $motifReintegration): Response
    {
        $form = $this->createForm(MotifReintegrationType::class, $motifReintegration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('motif_reintegration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('motif_reintegration/edit.html.twig', [
            'motif_reintegration' => $motifReintegration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="motif_reintegration_delete", methods={"POST"})
     */
    public function delete(Request $request, MotifReintegration $motifReintegration): Response
    {
        if ($this->isCsrfTokenValid('delete'.$motifReintegration->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($motifReintegration);
            $entityManager->flush();
        }

        return $this->redirectToRoute('motif_reintegration_index', [], Response::HTTP_SEE_OTHER);
    }
}
