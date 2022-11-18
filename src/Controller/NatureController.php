<?php

namespace App\Controller;

use App\Entity\Nature;
use App\Form\NatureType;
use App\Repository\NatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/nature")
 */
class NatureController extends AbstractController
{
    /**
     * @Route("/", name="nature_index", methods={"GET"})
     */
    public function index(NatureRepository $natureRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('nature/index.html.twig', [
            'natures' => $natureRepository->findBy([], ["id" => "DESC"]),
        ]);
    }

    /**
     * @Route("/new", name="nature_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $nature = new Nature();
        $form = $this->createForm(NatureType::class, $nature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($nature);
            $entityManager->flush();

            return $this->redirectToRoute('nature_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('nature/new.html.twig', [
            'nature' => $nature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nature_show", methods={"GET"})
     */
    public function show(Nature $nature): Response
    {
        return $this->render('nature/show.html.twig', [
            'nature' => $nature,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="nature_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Nature $nature): Response
    {
        $form = $this->createForm(NatureType::class, $nature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nature_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('nature/edit.html.twig', [
            'nature' => $nature,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="nature_delete", methods={"POST"})
     */
    public function delete(Request $request, Nature $nature): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nature->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($nature);
            $entityManager->flush();
        }

        return $this->redirectToRoute('nature_index', [], Response::HTTP_SEE_OTHER);
    }
}
