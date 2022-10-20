<?php

namespace App\Controller;

use App\Entity\NotesPOS;
use App\Form\NotesPOSType;
use App\Repository\NotesPOSRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/notes/p/o/s")
 */
class NotesPOSController extends AbstractController
{
    /**
     * @Route("/", name="notes_p_o_s_index", methods={"GET"})
     */
    public function index(NotesPOSRepository $notesPOSRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('notes_pos/index.html.twig', [
            'notes_p_o_ss' => $notesPOSRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="notes_p_o_s_recherche", methods={"GET"})
     */
    public function recherche(NotesPOSRepository $notesPOSRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $notesPOSRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('notes_pos/index.html.twig', [
            'notes_p_o_ss' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="notes_p_o_s_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $notesPO = new NotesPOS();
        $form = $this->createForm(NotesPOSType::class, $notesPO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($notesPO);
            $entityManager->flush();

            return $this->redirectToRoute('notes_p_o_s_index');
        }

        return $this->render('notes_pos/new.html.twig', [
            'notes_p_o' => $notesPO,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="notes_p_o_s_show", methods={"GET"})
     */
    public function show(NotesPOS $notesPO): Response
    {
        return $this->render('notes_pos/show.html.twig', [
            'notes_p_o' => $notesPO,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="notes_p_o_s_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, NotesPOS $notesPO): Response
    {
        $form = $this->createForm(NotesPOSType::class, $notesPO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('notes_p_o_s_index');
        }

        return $this->render('notes_pos/edit.html.twig', [
            'notes_p_o' => $notesPO,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="notes_p_o_s_delete", methods={"DELETE"})
     */
    public function delete(Request $request, NotesPOS $notesPO): Response
    {
        if ($this->isCsrfTokenValid('delete'.$notesPO->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($notesPO);
            $entityManager->flush();
        }

        return $this->redirectToRoute('notes_p_o_s_index');
    }
}
