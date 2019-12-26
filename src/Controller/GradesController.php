<?php

namespace App\Controller;

use App\Entity\Grades;
use App\Form\GradesType;
use App\Repository\GradesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/grades")
 */
class GradesController extends AbstractController
{
    /**
     * @Route("/", name="grades_index", methods={"GET"})
     */
    public function index(GradesRepository $gradesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $gradesRepository->findBy([], ["id" => "DESC"]), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('grades/index.html.twig', [
            'grades' => $pagination,
        ]);
    }
    /**
     * @Route("/recherche", name="grades_recherche", methods={"GET"})
     */
    public function recherche(GradesRepository $gradesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $gradesRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('grades/index.html.twig', [
            'grades' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="grades_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $grade = new Grades();
        $form = $this->createForm(GradesType::class, $grade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($grade);
            $entityManager->flush();

            return $this->redirectToRoute('grades_index');
        }

        return $this->render('grades/new.html.twig', [
            'grade' => $grade,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="grades_show", methods={"GET"})
     */
    public function show(Grades $grade): Response
    {
        return $this->render('grades/show.html.twig', [
            'grade' => $grade,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="grades_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Grades $grade): Response
    {
        $form = $this->createForm(GradesType::class, $grade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('grades_index');
        }

        return $this->render('grades/edit.html.twig', [
            'grade' => $grade,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="grades_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Grades $grade): Response
    {
        if ($this->isCsrfTokenValid('delete'.$grade->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($grade);
            $entityManager->flush();
        }

        return $this->redirectToRoute('grades_index');
    }
}
