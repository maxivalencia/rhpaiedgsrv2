<?php

namespace App\Controller;

use App\Entity\SituationSanitaire;
use App\Form\SituationSanitaireType;
use App\Repository\SituationSanitaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/situation/sanitaire")
 */
class SituationSanitaireController extends AbstractController
{
    /**
     * @Route("/", name="situation_sanitaire_index", methods={"GET"})
     */
    public function index(SituationSanitaireRepository $situationSanitaireRepository): Response
    {
        return $this->render('situation_sanitaire/index.html.twig', [
            'situation_sanitaires' => $situationSanitaireRepository->findBy([], ["id" => "DESC"]),
        ]);
    }

    /**
     * @Route("/new", name="situation_sanitaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $situationSanitaire = new SituationSanitaire();
        $form = $this->createForm(SituationSanitaireType::class, $situationSanitaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($situationSanitaire);
            $entityManager->flush();

            return $this->redirectToRoute('situation_sanitaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('situation_sanitaire/new.html.twig', [
            'situation_sanitaire' => $situationSanitaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="situation_sanitaire_show", methods={"GET"})
     */
    public function show(SituationSanitaire $situationSanitaire): Response
    {
        return $this->render('situation_sanitaire/show.html.twig', [
            'situation_sanitaire' => $situationSanitaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="situation_sanitaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SituationSanitaire $situationSanitaire): Response
    {
        $form = $this->createForm(SituationSanitaireType::class, $situationSanitaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('situation_sanitaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('situation_sanitaire/edit.html.twig', [
            'situation_sanitaire' => $situationSanitaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="situation_sanitaire_delete", methods={"POST"})
     */
    public function delete(Request $request, SituationSanitaire $situationSanitaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$situationSanitaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($situationSanitaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('situation_sanitaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
