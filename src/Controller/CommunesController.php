<?php

namespace App\Controller;

use App\Entity\Communes;
use App\Form\CommunesType;
use App\Repository\CommunesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/communes")
 */
class CommunesController extends AbstractController
{
    /**
     * @Route("/", name="communes_index", methods={"GET"})
     */
    public function index(CommunesRepository $communesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('communes/index.html.twig', [
            'communes' => $communesRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="communes_recherche", methods={"GET"})
     */
    public function recherche(CommunesRepository $communesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $communesRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        ); 
        return $this->render('communes/index.html.twig', [
            'communes' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="communes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commune = new Communes();
        $form = $this->createForm(CommunesType::class, $commune);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commune);
            $entityManager->flush();

            return $this->redirectToRoute('communes_index');
        }

        return $this->render('communes/new.html.twig', [
            'commune' => $commune,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="communes_show", methods={"GET"})
     */
    public function show(Communes $commune): Response
    {
        return $this->render('communes/show.html.twig', [
            'commune' => $commune,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="communes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Communes $commune): Response
    {
        $form = $this->createForm(CommunesType::class, $commune);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('communes_index');
        }

        return $this->render('communes/edit.html.twig', [
            'commune' => $commune,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="communes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Communes $commune): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commune->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commune);
            $entityManager->flush();
        }

        return $this->redirectToRoute('communes_index');
    }
}
