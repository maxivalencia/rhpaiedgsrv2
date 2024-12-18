<?php

namespace App\Controller;

use App\Entity\Enfants;
use App\Form\EnfantsType;
use App\Repository\EnfantsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/enfants")
 */
class EnfantsController extends AbstractController
{
    /**
     * @Route("/", name="enfants_index", methods={"GET"})
     */
    public function index(EnfantsRepository $enfantsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('enfants/index.html.twig', [
            'enfants' => $enfantsRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="enfants_recherche", methods={"GET"})
     */
    public function recherche(EnfantsRepository $enfantsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $enfantsRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('enfants/index.html.twig', [
            'enfants' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="enfants_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $enfant = new Enfants();
        $form = $this->createForm(EnfantsType::class, $enfant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($enfant);
            $entityManager->flush();

            $this->addFlash('success', "L'ajout a été effectué avec succès.");

            return $this->redirectToRoute('enfants_index');
        }

        return $this->render('enfants/new.html.twig', [
            'enfant' => $enfant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="enfants_show", methods={"GET"})
     */
    public function show(Enfants $enfant): Response
    {
        return $this->render('enfants/show.html.twig', [
            'enfant' => $enfant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="enfants_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Enfants $enfant): Response
    {
        $form = $this->createForm(EnfantsType::class, $enfant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', "La modification a été effectuée avec succès.");

            return $this->redirectToRoute('enfants_index');
        }

        return $this->render('enfants/edit.html.twig', [
            'enfant' => $enfant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="enfants_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Enfants $enfant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$enfant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($enfant);
            $entityManager->flush();

            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('enfants_index');
    }
}
