<?php

namespace App\Controller;

use App\Entity\FonctionsConjoints;
use App\Form\FonctionsConjointsType;
use App\Repository\FonctionsConjointsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/fonctions/conjoints")
 */
class FonctionsConjointsController extends AbstractController
{
    /**
     * @Route("/", name="fonctions_conjoints_index", methods={"GET"})
     */
    public function index(FonctionsConjointsRepository $fonctionsConjointsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $fonctionsConjointsRepository->findBy([], ["id" => "DESC"]), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('fonctions_conjoints/index.html.twig', [
            'fonctions_conjoints' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="fonctions_conjoints_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fonctionsConjoint = new FonctionsConjoints();
        $form = $this->createForm(FonctionsConjointsType::class, $fonctionsConjoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fonctionsConjoint);
            $entityManager->flush();

            return $this->redirectToRoute('fonctions_conjoints_index');
        }

        return $this->render('fonctions_conjoints/new.html.twig', [
            'fonctions_conjoint' => $fonctionsConjoint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fonctions_conjoints_show", methods={"GET"})
     */
    public function show(FonctionsConjoints $fonctionsConjoint): Response
    {
        return $this->render('fonctions_conjoints/show.html.twig', [
            'fonctions_conjoint' => $fonctionsConjoint,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fonctions_conjoints_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FonctionsConjoints $fonctionsConjoint): Response
    {
        $form = $this->createForm(FonctionsConjointsType::class, $fonctionsConjoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fonctions_conjoints_index');
        }

        return $this->render('fonctions_conjoints/edit.html.twig', [
            'fonctions_conjoint' => $fonctionsConjoint,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fonctions_conjoints_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FonctionsConjoints $fonctionsConjoint): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fonctionsConjoint->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fonctionsConjoint);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fonctions_conjoints_index');
    }
}
