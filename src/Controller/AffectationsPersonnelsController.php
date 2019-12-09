<?php

namespace App\Controller;

use App\Entity\AffectationsPersonnels;
use App\Form\AffectationsPersonnelsType;
use App\Repository\AffectationsPersonnelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/affectations/personnels")
 */
class AffectationsPersonnelsController extends AbstractController
{
    /**
     * @Route("/", name="affectations_personnels_index", methods={"GET"})
     */
    public function index(AffectationsPersonnelsRepository $affectationsPersonnelsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $affectationsPersonnelsRepository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        ); 
        return $this->render('affectations_personnels/index.html.twig', [
            'affectations_personnels' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="affectations_personnels_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $affectationsPersonnel = new AffectationsPersonnels();
        $form = $this->createForm(AffectationsPersonnelsType::class, $affectationsPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($affectationsPersonnel);
            $entityManager->flush();

            return $this->redirectToRoute('affectations_personnels_index');
        }

        return $this->render('affectations_personnels/new.html.twig', [
            'affectations_personnel' => $affectationsPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="affectations_personnels_show", methods={"GET"})
     */
    public function show(AffectationsPersonnels $affectationsPersonnel): Response
    {
        return $this->render('affectations_personnels/show.html.twig', [
            'affectations_personnel' => $affectationsPersonnel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="affectations_personnels_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AffectationsPersonnels $affectationsPersonnel): Response
    {
        $form = $this->createForm(AffectationsPersonnelsType::class, $affectationsPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('affectations_personnels_index');
        }

        return $this->render('affectations_personnels/edit.html.twig', [
            'affectations_personnel' => $affectationsPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="affectations_personnels_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AffectationsPersonnels $affectationsPersonnel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$affectationsPersonnel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($affectationsPersonnel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('affectations_personnels_index');
    }
}
