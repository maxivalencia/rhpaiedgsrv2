<?php

namespace App\Controller;

use App\Entity\Unites;
use App\Form\UnitesType;
use App\Repository\UnitesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/unites")
 */
class UnitesController extends AbstractController
{
    /**
     * @Route("/", name="unites_index", methods={"GET"})
     */
    public function index(UnitesRepository $unitesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('unites/index.html.twig', [
            'unites' => $unitesRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="unites_recherche", methods={"GET"})
     */
    public function recherche(UnitesRepository $unitesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $unitesRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        ); 
        return $this->render('unites/index.html.twig', [
            'unites' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="unites_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $unite = new Unites();
        $form = $this->createForm(UnitesType::class, $unite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($unite);
            $entityManager->flush();
            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');
            return $this->redirectToRoute('unites_index');
        }

        return $this->render('unites/new.html.twig', [
            'unite' => $unite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="unites_show", methods={"GET"})
     */
    public function show(Unites $unite): Response
    {
        return $this->render('unites/show.html.twig', [
            'unite' => $unite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="unites_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Unites $unite): Response
    {
        $form = $this->createForm(UnitesType::class, $unite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La modification a été effectuée avec succès.');
            return $this->redirectToRoute('unites_index');
        }

        return $this->render('unites/edit.html.twig', [
            'unite' => $unite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="unites_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Unites $unite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$unite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($unite);
            $entityManager->flush();
            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('unites_index');
    }
}
