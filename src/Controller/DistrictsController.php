<?php

namespace App\Controller;

use App\Entity\Districts;
use App\Form\DistrictsType;
use App\Repository\DistrictsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/districts")
 */
class DistrictsController extends AbstractController
{
    /**
     * @Route("/", name="districts_index", methods={"GET"})
     */
    public function index(DistrictsRepository $districtsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('districts/index.html.twig', [
            'districts' => $districtsRepository->findBY([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="districts_recherche", methods={"GET"})
     */
    public function recherche(DistrictsRepository $districtsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $districtsRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('districts/index.html.twig', [
            'districts' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="districts_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $district = new Districts();
        $form = $this->createForm(DistrictsType::class, $district);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($district);
            $entityManager->flush();

            return $this->redirectToRoute('districts_index');
        }

        return $this->render('districts/new.html.twig', [
            'district' => $district,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="districts_show", methods={"GET"})
     */
    public function show(Districts $district): Response
    {
        return $this->render('districts/show.html.twig', [
            'district' => $district,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="districts_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Districts $district): Response
    {
        $form = $this->createForm(DistrictsType::class, $district);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('districts_index');
        }

        return $this->render('districts/edit.html.twig', [
            'district' => $district,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="districts_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Districts $district): Response
    {
        if ($this->isCsrfTokenValid('delete'.$district->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($district);
            $entityManager->flush();
        }

        return $this->redirectToRoute('districts_index');
    }
}
