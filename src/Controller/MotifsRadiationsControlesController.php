<?php

namespace App\Controller;

use App\Entity\MotifsRadiationsControles;
use App\Form\MotifsRadiationsControlesType;
use App\Repository\MotifsRadiationsControlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/motifs/radiations/controles")
 */
class MotifsRadiationsControlesController extends AbstractController
{
    /**
     * @Route("/", name="motifs_radiations_controles_index", methods={"GET"})
     */
    public function index(MotifsRadiationsControlesRepository $motifsRadiationsControlesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('motifs_radiations_controles/index.html.twig', [
            'motifs_radiations_controles' => $motifsRadiationsControlesRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="motifs_radiations_controles_recherche", methods={"GET"})
     */
    public function recherche(MotifsRadiationsControlesRepository $motifsRadiationsControlesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $motifsRadiationsControlesRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('motifs_radiations_controles/index.html.twig', [
            'motifs_radiations_controles' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="motifs_radiations_controles_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $motifsRadiationsControle = new MotifsRadiationsControles();
        $form = $this->createForm(MotifsRadiationsControlesType::class, $motifsRadiationsControle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($motifsRadiationsControle);
            $entityManager->flush();

            return $this->redirectToRoute('motifs_radiations_controles_index');
        }

        return $this->render('motifs_radiations_controles/new.html.twig', [
            'motifs_radiations_controle' => $motifsRadiationsControle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="motifs_radiations_controles_show", methods={"GET"})
     */
    public function show(MotifsRadiationsControles $motifsRadiationsControle): Response
    {
        return $this->render('motifs_radiations_controles/show.html.twig', [
            'motifs_radiations_controle' => $motifsRadiationsControle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="motifs_radiations_controles_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MotifsRadiationsControles $motifsRadiationsControle): Response
    {
        $form = $this->createForm(MotifsRadiationsControlesType::class, $motifsRadiationsControle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('motifs_radiations_controles_index');
        }

        return $this->render('motifs_radiations_controles/edit.html.twig', [
            'motifs_radiations_controle' => $motifsRadiationsControle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="motifs_radiations_controles_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MotifsRadiationsControles $motifsRadiationsControle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$motifsRadiationsControle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($motifsRadiationsControle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('motifs_radiations_controles_index');
    }
}
