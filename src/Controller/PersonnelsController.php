<?php

namespace App\Controller;

use App\Entity\Personnels;
use App\Form\PersonnelsType;
use App\Repository\PersonnelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/personnelsactifs")
 */
class PersonnelsController extends AbstractController
{
    /**
     * @Route("/", name="personnels_index", methods={"GET"})
     */
    public function index(PersonnelsRepository $personnelsRepository): Response
    {
        return $this->render('personnels/index.html.twig', [
            'personnels' => $personnelsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="personnels_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $personnel = new Personnels();
        $form = $this->createForm(PersonnelsType::class, $personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($personnel);
            $entityManager->flush();

            return $this->redirectToRoute('personnels_index');
        }

        return $this->render('personnels/new.html.twig', [
            'personnel' => $personnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personnels_show", methods={"GET"})
     */
    public function show(Personnels $personnel): Response
    {
        return $this->render('personnels/show.html.twig', [
            'personnel' => $personnel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="personnels_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Personnels $personnel): Response
    {
        $form = $this->createForm(PersonnelsType::class, $personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personnels_index');
        }

        return $this->render('personnels/edit.html.twig', [
            'personnel' => $personnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personnels_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Personnels $personnel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personnel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($personnel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('personnels_index');
    }
}
