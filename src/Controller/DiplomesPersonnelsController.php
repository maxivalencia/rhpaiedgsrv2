<?php

namespace App\Controller;

use App\Entity\DiplomesPersonnels;
use App\Form\DiplomesPersonnelsType;
use App\Repository\DiplomesPersonnelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/diplomes/personnels")
 */
class DiplomesPersonnelsController extends AbstractController
{
    /**
     * @Route("/", name="diplomes_personnels_index", methods={"GET"})
     */
    public function index(DiplomesPersonnelsRepository $diplomesPersonnelsRepository): Response
    {
        return $this->render('diplomes_personnels/index.html.twig', [
            'diplomes_personnels' => $diplomesPersonnelsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="diplomes_personnels_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $diplomesPersonnel = new DiplomesPersonnels();
        $form = $this->createForm(DiplomesPersonnelsType::class, $diplomesPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($diplomesPersonnel);
            $entityManager->flush();

            return $this->redirectToRoute('diplomes_personnels_index');
        }

        return $this->render('diplomes_personnels/new.html.twig', [
            'diplomes_personnel' => $diplomesPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="diplomes_personnels_show", methods={"GET"})
     */
    public function show(DiplomesPersonnels $diplomesPersonnel): Response
    {
        return $this->render('diplomes_personnels/show.html.twig', [
            'diplomes_personnel' => $diplomesPersonnel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="diplomes_personnels_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DiplomesPersonnels $diplomesPersonnel): Response
    {
        $form = $this->createForm(DiplomesPersonnelsType::class, $diplomesPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('diplomes_personnels_index');
        }

        return $this->render('diplomes_personnels/edit.html.twig', [
            'diplomes_personnel' => $diplomesPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="diplomes_personnels_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DiplomesPersonnels $diplomesPersonnel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$diplomesPersonnel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($diplomesPersonnel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('diplomes_personnels_index');
    }
}
