<?php

namespace App\Controller;

use App\Entity\DecisionReintegration;
use App\Form\DecisionReintegrationType;
use App\Repository\DecisionReintegrationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/decision/reintegration")
 */
class DecisionReintegrationController extends AbstractController
{
    /**
     * @Route("/", name="decision_reintegration_index", methods={"GET"})
     */
    public function index(DecisionReintegrationRepository $decisionReintegrationRepository): Response
    {
        return $this->render('decision_reintegration/index.html.twig', [
            'decision_reintegrations' => $decisionReintegrationRepository->findBy([], ["id" => "DESC"]),
        ]);
    }

    /**
     * @Route("/new", name="decision_reintegration_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $decisionReintegration = new DecisionReintegration();
        $form = $this->createForm(DecisionReintegrationType::class, $decisionReintegration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($decisionReintegration);
            $entityManager->flush();

            return $this->redirectToRoute('decision_reintegration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('decision_reintegration/new.html.twig', [
            'decision_reintegration' => $decisionReintegration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decision_reintegration_show", methods={"GET"})
     */
    public function show(DecisionReintegration $decisionReintegration): Response
    {
        return $this->render('decision_reintegration/show.html.twig', [
            'decision_reintegration' => $decisionReintegration,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="decision_reintegration_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DecisionReintegration $decisionReintegration): Response
    {
        $form = $this->createForm(DecisionReintegrationType::class, $decisionReintegration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('decision_reintegration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('decision_reintegration/edit.html.twig', [
            'decision_reintegration' => $decisionReintegration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decision_reintegration_delete", methods={"POST"})
     */
    public function delete(Request $request, DecisionReintegration $decisionReintegration): Response
    {
        if ($this->isCsrfTokenValid('delete'.$decisionReintegration->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($decisionReintegration);
            $entityManager->flush();
        }

        return $this->redirectToRoute('decision_reintegration_index', [], Response::HTTP_SEE_OTHER);
    }
}
