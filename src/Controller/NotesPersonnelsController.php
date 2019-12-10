<?php

namespace App\Controller;

use App\Entity\NotesPersonnels;
use App\Form\NotesPersonnelsType;
use App\Repository\NotesPersonnelsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/notes/personnels")
 */
class NotesPersonnelsController extends AbstractController
{
    /**
     * @Route("/", name="notes_personnels_index", methods={"GET"})
     */
    public function index(NotesPersonnelsRepository $notesPersonnelsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $notesPersonnelsRepository->findBy([], ["id" => "DESC"]), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('notes_personnels/index.html.twig', [
            'notes_personnels' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="notes_personnels_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $notesPersonnel = new NotesPersonnels();
        $form = $this->createForm(NotesPersonnelsType::class, $notesPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($notesPersonnel);
            $entityManager->flush();

            return $this->redirectToRoute('notes_personnels_index');
        }

        return $this->render('notes_personnels/new.html.twig', [
            'notes_personnel' => $notesPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="notes_personnels_show", methods={"GET"})
     */
    public function show(NotesPersonnels $notesPersonnel): Response
    {
        return $this->render('notes_personnels/show.html.twig', [
            'notes_personnel' => $notesPersonnel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="notes_personnels_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, NotesPersonnels $notesPersonnel): Response
    {
        $form = $this->createForm(NotesPersonnelsType::class, $notesPersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('notes_personnels_index');
        }

        return $this->render('notes_personnels/edit.html.twig', [
            'notes_personnel' => $notesPersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="notes_personnels_delete", methods={"DELETE"})
     */
    public function delete(Request $request, NotesPersonnels $notesPersonnel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$notesPersonnel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($notesPersonnel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('notes_personnels_index');
    }
}
