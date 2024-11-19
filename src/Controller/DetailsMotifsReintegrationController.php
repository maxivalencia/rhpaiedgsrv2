<?php

namespace App\Controller;

use App\Entity\DetailsMotifsReintegration;
use App\Form\DetailsMotifsReintegrationType;
use App\Repository\DetailsMotifsReintegrationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/details/motifs/reintegration")
 */
class DetailsMotifsReintegrationController extends AbstractController
{
    /**
     * @Route("/", name="details_motifs_reintegration_index", methods={"GET"})
     */
    public function index(DetailsMotifsReintegrationRepository $detailsMotifsReintegrationRepository): Response
    {
        return $this->render('details_motifs_reintegration/index.html.twig', [
            'details_motifs_reintegrations' => $detailsMotifsReintegrationRepository->findBy([], ["id" => "DESC"]),
        ]);
    }

    /**
     * @Route("/new", name="details_motifs_reintegration_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $detailsMotifsReintegration = new DetailsMotifsReintegration();
        $form = $this->createForm(DetailsMotifsReintegrationType::class, $detailsMotifsReintegration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($detailsMotifsReintegration);
            $entityManager->flush();
            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');
            return $this->redirectToRoute('details_motifs_reintegration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('details_motifs_reintegration/new.html.twig', [
            'details_motifs_reintegration' => $detailsMotifsReintegration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="details_motifs_reintegration_show", methods={"GET"})
     */
    public function show(DetailsMotifsReintegration $detailsMotifsReintegration): Response
    {
        return $this->render('details_motifs_reintegration/show.html.twig', [
            'details_motifs_reintegration' => $detailsMotifsReintegration,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="details_motifs_reintegration_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DetailsMotifsReintegration $detailsMotifsReintegration): Response
    {
        $form = $this->createForm(DetailsMotifsReintegrationType::class, $detailsMotifsReintegration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La modification a été effectuée avec succès.');
            return $this->redirectToRoute('details_motifs_reintegration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('details_motifs_reintegration/edit.html.twig', [
            'details_motifs_reintegration' => $detailsMotifsReintegration,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="details_motifs_reintegration_delete", methods={"POST"})
     */
    public function delete(Request $request, DetailsMotifsReintegration $detailsMotifsReintegration): Response
    {
        if ($this->isCsrfTokenValid('delete'.$detailsMotifsReintegration->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($detailsMotifsReintegration);
            $entityManager->flush();
            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('details_motifs_reintegration_index', [], Response::HTTP_SEE_OTHER);
    }
}
