<?php

namespace App\Controller;

use App\Entity\TypesCommunes;
use App\Form\TypesCommunesType;
use App\Repository\TypesCommunesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/types/communes")
 */
class TypesCommunesController extends AbstractController
{
    /**
     * @Route("/", name="types_communes_index", methods={"GET"})
     */
    public function index(TypesCommunesRepository $typesCommunesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $typesCommunesRepository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('types_communes/index.html.twig', [
            'types_communes' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="types_communes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typesCommune = new TypesCommunes();
        $form = $this->createForm(TypesCommunesType::class, $typesCommune);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typesCommune);
            $entityManager->flush();

            return $this->redirectToRoute('types_communes_index');
        }

        return $this->render('types_communes/new.html.twig', [
            'types_commune' => $typesCommune,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="types_communes_show", methods={"GET"})
     */
    public function show(TypesCommunes $typesCommune): Response
    {
        return $this->render('types_communes/show.html.twig', [
            'types_commune' => $typesCommune,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="types_communes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypesCommunes $typesCommune): Response
    {
        $form = $this->createForm(TypesCommunesType::class, $typesCommune);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('types_communes_index');
        }

        return $this->render('types_communes/edit.html.twig', [
            'types_commune' => $typesCommune,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="types_communes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypesCommunes $typesCommune): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typesCommune->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typesCommune);
            $entityManager->flush();
        }

        return $this->redirectToRoute('types_communes_index');
    }
}
