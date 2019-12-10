<?php

namespace App\Controller;

use App\Entity\DroitsPensions;
use App\Form\DroitsPensionsType;
use App\Repository\DroitsPensionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/droits/pensions")
 */
class DroitsPensionsController extends AbstractController
{
    /**
     * @Route("/", name="droits_pensions_index", methods={"GET"})
     */
    public function index(DroitsPensionsRepository $droitsPensionsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $droitsPensionsRepository->findBy([], ["id" => "DESC"]), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('droits_pensions/index.html.twig', [
            'droits_pensions' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="droits_pensions_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $droitsPension = new DroitsPensions();
        $form = $this->createForm(DroitsPensionsType::class, $droitsPension);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($droitsPension);
            $entityManager->flush();

            return $this->redirectToRoute('droits_pensions_index');
        }

        return $this->render('droits_pensions/new.html.twig', [
            'droits_pension' => $droitsPension,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="droits_pensions_show", methods={"GET"})
     */
    public function show(DroitsPensions $droitsPension): Response
    {
        return $this->render('droits_pensions/show.html.twig', [
            'droits_pension' => $droitsPension,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="droits_pensions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DroitsPensions $droitsPension): Response
    {
        $form = $this->createForm(DroitsPensionsType::class, $droitsPension);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('droits_pensions_index');
        }

        return $this->render('droits_pensions/edit.html.twig', [
            'droits_pension' => $droitsPension,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="droits_pensions_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DroitsPensions $droitsPension): Response
    {
        if ($this->isCsrfTokenValid('delete'.$droitsPension->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($droitsPension);
            $entityManager->flush();
        }

        return $this->redirectToRoute('droits_pensions_index');
    }
}
