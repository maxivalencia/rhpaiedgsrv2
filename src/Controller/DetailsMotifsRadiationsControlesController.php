<?php

namespace App\Controller;

use App\Entity\DetailsMotifsRadiationsControles;
use App\Form\DetailsMotifsRadiationsControlesType;
use App\Repository\DetailsMotifsRadiationsControlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/details/motifs/radiations/controles")
 */
class DetailsMotifsRadiationsControlesController extends AbstractController
{
    /**
     * @Route("/", name="details_motifs_radiations_controles_index", methods={"GET"})
     */
    public function index(DetailsMotifsRadiationsControlesRepository $detailsMotifsRadiationsControlesRepository): Response
    {
        return $this->render('details_motifs_radiations_controles/index.html.twig', [
            'details_motifs_radiations_controles' => $detailsMotifsRadiationsControlesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="details_motifs_radiations_controles_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $detailsMotifsRadiationsControle = new DetailsMotifsRadiationsControles();
        $form = $this->createForm(DetailsMotifsRadiationsControlesType::class, $detailsMotifsRadiationsControle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($detailsMotifsRadiationsControle);
            $entityManager->flush();

            return $this->redirectToRoute('details_motifs_radiations_controles_index');
        }

        return $this->render('details_motifs_radiations_controles/new.html.twig', [
            'details_motifs_radiations_controle' => $detailsMotifsRadiationsControle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="details_motifs_radiations_controles_show", methods={"GET"})
     */
    public function show(DetailsMotifsRadiationsControles $detailsMotifsRadiationsControle): Response
    {
        return $this->render('details_motifs_radiations_controles/show.html.twig', [
            'details_motifs_radiations_controle' => $detailsMotifsRadiationsControle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="details_motifs_radiations_controles_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DetailsMotifsRadiationsControles $detailsMotifsRadiationsControle): Response
    {
        $form = $this->createForm(DetailsMotifsRadiationsControlesType::class, $detailsMotifsRadiationsControle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('details_motifs_radiations_controles_index');
        }

        return $this->render('details_motifs_radiations_controles/edit.html.twig', [
            'details_motifs_radiations_controle' => $detailsMotifsRadiationsControle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="details_motifs_radiations_controles_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DetailsMotifsRadiationsControles $detailsMotifsRadiationsControle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$detailsMotifsRadiationsControle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($detailsMotifsRadiationsControle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('details_motifs_radiations_controles_index');
    }
}
