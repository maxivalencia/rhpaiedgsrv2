<?php

namespace App\Controller;

use App\Entity\DecisionsAffectations;
use App\Form\DecisionsAffectationsType;
use App\Repository\DecisionsAffectationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/decisions/affectations")
 */
class DecisionsAffectationsController extends AbstractController
{
    /**
     * @Route("/", name="decisions_affectations_index", methods={"GET"})
     */
    public function index(DecisionsAffectationsRepository $decisionsAffectationsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('decisions_affectations/index.html.twig', [
            'decisions_affectations' => $decisionsAffectationsRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="decisions_affectations_recherche", methods={"GET"})
     */
    public function recherche(DecisionsAffectationsRepository $decisionsAffectationsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $decisionsAffectationsRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        ); 
        return $this->render('decisions_affectations/index.html.twig', [
            'decisions_affectations' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="decisions_affectations_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $decisionsAffectation = new DecisionsAffectations();
        $form = $this->createForm(DecisionsAffectationsType::class, $decisionsAffectation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($decisionsAffectation);
            $entityManager->flush();

            return $this->redirectToRoute('decisions_affectations_index');
        }

        return $this->render('decisions_affectations/new.html.twig', [
            'decisions_affectation' => $decisionsAffectation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decisions_affectations_show", methods={"GET"})
     */
    public function show(DecisionsAffectations $decisionsAffectation): Response
    {
        return $this->render('decisions_affectations/show.html.twig', [
            'decisions_affectation' => $decisionsAffectation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="decisions_affectations_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DecisionsAffectations $decisionsAffectation): Response
    {
        $form = $this->createForm(DecisionsAffectationsType::class, $decisionsAffectation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('decisions_affectations_index');
        }

        return $this->render('decisions_affectations/edit.html.twig', [
            'decisions_affectation' => $decisionsAffectation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decisions_affectations_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DecisionsAffectations $decisionsAffectation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$decisionsAffectation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($decisionsAffectation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('decisions_affectations_index');
    }
}
