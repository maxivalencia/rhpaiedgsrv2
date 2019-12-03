<?php

namespace App\Controller;

use App\Entity\DomaineDiplome;
use App\Form\DomaineDiplomeType;
use App\Repository\DomaineDiplomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/domaine/diplome")
 */
class DomaineDiplomeController extends AbstractController
{
    /**
     * @Route("/", name="domaine_diplome_index", methods={"GET"})
     */
    public function index(DomaineDiplomeRepository $domaineDiplomeRepository): Response
    {
        return $this->render('domaine_diplome/index.html.twig', [
            'domaine_diplomes' => $domaineDiplomeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="domaine_diplome_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $domaineDiplome = new DomaineDiplome();
        $form = $this->createForm(DomaineDiplomeType::class, $domaineDiplome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($domaineDiplome);
            $entityManager->flush();

            return $this->redirectToRoute('domaine_diplome_index');
        }

        return $this->render('domaine_diplome/new.html.twig', [
            'domaine_diplome' => $domaineDiplome,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="domaine_diplome_show", methods={"GET"})
     */
    public function show(DomaineDiplome $domaineDiplome): Response
    {
        return $this->render('domaine_diplome/show.html.twig', [
            'domaine_diplome' => $domaineDiplome,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="domaine_diplome_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DomaineDiplome $domaineDiplome): Response
    {
        $form = $this->createForm(DomaineDiplomeType::class, $domaineDiplome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('domaine_diplome_index');
        }

        return $this->render('domaine_diplome/edit.html.twig', [
            'domaine_diplome' => $domaineDiplome,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="domaine_diplome_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DomaineDiplome $domaineDiplome): Response
    {
        if ($this->isCsrfTokenValid('delete'.$domaineDiplome->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($domaineDiplome);
            $entityManager->flush();
        }

        return $this->redirectToRoute('domaine_diplome_index');
    }
}
