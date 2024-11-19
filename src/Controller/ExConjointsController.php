<?php

namespace App\Controller;

use App\Entity\ExConjoints;
use App\Form\ExConjointsType;
use App\Repository\ExConjointsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/ex/conjoints")
 */
class ExConjointsController extends AbstractController
{
    /**
     * @Route("/", name="ex_conjoints_index", methods={"GET"})
     */
    public function index(ExConjointsRepository $exConjointsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('ex_conjoints/index.html.twig', [
            'ex_conjoints' => $exConjointsRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="ex_conjoints_recherche", methods={"GET"})
     */
    public function recherche(ExConjointsRepository $exConjointsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $exConjointsRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('ex_conjoints/index.html.twig', [
            'ex_conjoints' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="ex_conjoints_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $exConjoint = new ExConjoints();
        $form = $this->createForm(ExConjointsType::class, $exConjoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($exConjoint);
            $entityManager->flush();
            $this->addFlash('success', "L'ajout a été effectué avec succès.");
            return $this->redirectToRoute('ex_conjoints_index');
        }

        return $this->render('ex_conjoints/new.html.twig', [
            'ex_conjoint' => $exConjoint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ex_conjoints_show", methods={"GET"})
     */
    public function show(ExConjoints $exConjoint): Response
    {
        return $this->render('ex_conjoints/show.html.twig', [
            'ex_conjoint' => $exConjoint,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ex_conjoints_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ExConjoints $exConjoint): Response
    {
        $form = $this->createForm(ExConjointsType::class, $exConjoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', "La modification a été effectuée avec succès.");
            return $this->redirectToRoute('ex_conjoints_index');
        }

        return $this->render('ex_conjoints/edit.html.twig', [
            'ex_conjoint' => $exConjoint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ex_conjoints_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ExConjoints $exConjoint): Response
    {
        if ($this->isCsrfTokenValid('delete'.$exConjoint->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($exConjoint);
            $entityManager->flush();
            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('ex_conjoints_index');
    }
}
