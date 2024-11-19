<?php

namespace App\Controller;

use App\Entity\Punitions;
use App\Form\PunitionsType;
use App\Repository\PunitionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/punitions")
 */
class PunitionsController extends AbstractController
{
    /**
     * @Route("/", name="punitions_index", methods={"GET"})
     */
    public function index(PunitionsRepository $punitionsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('punitions/index.html.twig', [
            'punitions' => $punitionsRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="punitions_recherche", methods={"GET"})
     */
    public function recherche(PunitionsRepository $punitionsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $punitionsRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('punitions/index.html.twig', [
            'punitions' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="punitions_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $punition = new Punitions();
        $form = $this->createForm(PunitionsType::class, $punition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($punition);
            $entityManager->flush();
            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');
            return $this->redirectToRoute('punitions_index');
        }

        return $this->render('punitions/new.html.twig', [
            'punition' => $punition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="punitions_show", methods={"GET"})
     */
    public function show(Punitions $punition): Response
    {
        return $this->render('punitions/show.html.twig', [
            'punition' => $punition,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="punitions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Punitions $punition): Response
    {
        $form = $this->createForm(PunitionsType::class, $punition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La modification a été effectuée avec succès.');

            return $this->redirectToRoute('punitions_index');
        }

        return $this->render('punitions/edit.html.twig', [
            'punition' => $punition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="punitions_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Punitions $punition): Response
    {
        if ($this->isCsrfTokenValid('delete'.$punition->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($punition);
            $entityManager->flush();
            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('punitions_index');
    }
}
