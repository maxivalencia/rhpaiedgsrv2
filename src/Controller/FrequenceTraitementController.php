<?php

namespace App\Controller;

use App\Entity\FrequenceTraitement;
use App\Form\FrequenceTraitementType;
use App\Repository\FrequenceTraitementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/frequence/traitement")
 */
class FrequenceTraitementController extends AbstractController
{
    /**
     * @Route("/", name="frequence_traitement_index", methods={"GET"})
     */
    public function index(FrequenceTraitementRepository $frequenceTraitementRepository): Response
    {
        return $this->render('frequence_traitement/index.html.twig', [
            'frequence_traitements' => $frequenceTraitementRepository->findBy([], ["id" => "DESC"]),
        ]);
    }

    /**
     * @Route("/new", name="frequence_traitement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $frequenceTraitement = new FrequenceTraitement();
        $form = $this->createForm(FrequenceTraitementType::class, $frequenceTraitement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($frequenceTraitement);
            $entityManager->flush();

            return $this->redirectToRoute('frequence_traitement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('frequence_traitement/new.html.twig', [
            'frequence_traitement' => $frequenceTraitement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="frequence_traitement_show", methods={"GET"})
     */
    public function show(FrequenceTraitement $frequenceTraitement): Response
    {
        return $this->render('frequence_traitement/show.html.twig', [
            'frequence_traitement' => $frequenceTraitement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="frequence_traitement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FrequenceTraitement $frequenceTraitement): Response
    {
        $form = $this->createForm(FrequenceTraitementType::class, $frequenceTraitement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('frequence_traitement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('frequence_traitement/edit.html.twig', [
            'frequence_traitement' => $frequenceTraitement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="frequence_traitement_delete", methods={"POST"})
     */
    public function delete(Request $request, FrequenceTraitement $frequenceTraitement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$frequenceTraitement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($frequenceTraitement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('frequence_traitement_index', [], Response::HTTP_SEE_OTHER);
    }
}
