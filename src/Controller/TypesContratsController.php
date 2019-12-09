<?php

namespace App\Controller;

use App\Entity\TypesContrats;
use App\Form\TypesContratsType;
use App\Repository\TypesContratsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/types/contrats")
 */
class TypesContratsController extends AbstractController
{
    /**
     * @Route("/", name="types_contrats_index", methods={"GET"})
     */
    public function index(TypesContratsRepository $typesContratsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $typesContratsRepository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        ); 
        return $this->render('types_contrats/index.html.twig', [
            'types_contrats' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="types_contrats_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typesContrat = new TypesContrats();
        $form = $this->createForm(TypesContratsType::class, $typesContrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typesContrat);
            $entityManager->flush();

            return $this->redirectToRoute('types_contrats_index');
        }

        return $this->render('types_contrats/new.html.twig', [
            'types_contrat' => $typesContrat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="types_contrats_show", methods={"GET"})
     */
    public function show(TypesContrats $typesContrat): Response
    {
        return $this->render('types_contrats/show.html.twig', [
            'types_contrat' => $typesContrat,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="types_contrats_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypesContrats $typesContrat): Response
    {
        $form = $this->createForm(TypesContratsType::class, $typesContrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('types_contrats_index');
        }

        return $this->render('types_contrats/edit.html.twig', [
            'types_contrat' => $typesContrat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="types_contrats_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypesContrats $typesContrat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typesContrat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typesContrat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('types_contrats_index');
    }
}
