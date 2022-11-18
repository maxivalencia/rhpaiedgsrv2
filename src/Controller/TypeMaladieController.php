<?php

namespace App\Controller;

use App\Entity\TypeMaladie;
use App\Form\TypeMaladieType;
use App\Repository\TypeMaladieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/maladie")
 */
class TypeMaladieController extends AbstractController
{
    /**
     * @Route("/", name="type_maladie_index", methods={"GET"})
     */
    public function index(TypeMaladieRepository $typeMaladieRepository): Response
    {
        return $this->render('type_maladie/index.html.twig', [
            'type_maladies' => $typeMaladieRepository->findBy([], ["id" => "DESC"]),
        ]);
    }

    /**
     * @Route("/new", name="type_maladie_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeMaladie = new TypeMaladie();
        $form = $this->createForm(TypeMaladieType::class, $typeMaladie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeMaladie);
            $entityManager->flush();

            return $this->redirectToRoute('type_maladie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_maladie/new.html.twig', [
            'type_maladie' => $typeMaladie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_maladie_show", methods={"GET"})
     */
    public function show(TypeMaladie $typeMaladie): Response
    {
        return $this->render('type_maladie/show.html.twig', [
            'type_maladie' => $typeMaladie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_maladie_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeMaladie $typeMaladie): Response
    {
        $form = $this->createForm(TypeMaladieType::class, $typeMaladie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_maladie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_maladie/edit.html.twig', [
            'type_maladie' => $typeMaladie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_maladie_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeMaladie $typeMaladie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeMaladie->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeMaladie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_maladie_index', [], Response::HTTP_SEE_OTHER);
    }
}
