<?php

namespace App\Controller;

use App\Entity\Regions;
use App\Form\RegionsType;
use App\Repository\RegionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/regions")
 */
class RegionsController extends AbstractController
{
    /**
     * @Route("/", name="regions_index", methods={"GET"})
     */
    public function index(RegionsRepository $regionsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('regions/index.html.twig', [
            'regions' => $regionsRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="regions_recherche", methods={"GET"})
     */
    public function recherche(RegionsRepository $regionsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $regionsRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('regions/index.html.twig', [
            'regions' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="regions_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $region = new Regions();
        $form = $this->createForm(RegionsType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($region);
            $entityManager->flush();
            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');
            return $this->redirectToRoute('regions_index');
        }

        return $this->render('regions/new.html.twig', [
            'region' => $region,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="regions_show", methods={"GET"})
     */
    public function show(Regions $region): Response
    {
        return $this->render('regions/show.html.twig', [
            'region' => $region,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="regions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Regions $region): Response
    {
        $form = $this->createForm(RegionsType::class, $region);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La modification a été effectuée avec succès.');
            return $this->redirectToRoute('regions_index');
        }

        return $this->render('regions/edit.html.twig', [
            'region' => $region,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="regions_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Regions $region): Response
    {
        if ($this->isCsrfTokenValid('delete'.$region->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($region);
            $entityManager->flush();
            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('regions_index');
    }
}
