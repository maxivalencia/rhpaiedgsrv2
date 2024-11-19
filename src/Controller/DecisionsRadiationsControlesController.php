<?php

namespace App\Controller;

use App\Entity\DecisionsRadiationsControles;
use App\Form\DecisionsRadiationsControlesType;
use App\Repository\DecisionsRadiationsControlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/decisions/radiations/controles")
 */
class DecisionsRadiationsControlesController extends AbstractController
{
    /**
     * @Route("/", name="decisions_radiations_controles_index", methods={"GET"})
     */
    public function index(DecisionsRadiationsControlesRepository $decisionsRadiationsControlesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('decisions_radiations_controles/index.html.twig', [
            'decisions_radiations_controles' => $decisionsRadiationsControlesRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="decisions_radiations_controles_recherche", methods={"GET"})
     */
    public function recherche(DecisionsRadiationsControlesRepository $decisionsRadiationsControlesRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $decisionsRadiationsControlesRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        ); 
        return $this->render('decisions_radiations_controles/index.html.twig', [
            'decisions_radiations_controles' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="decisions_radiations_controles_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $decisionsRadiationsControle = new DecisionsRadiationsControles();
        $form = $this->createForm(DecisionsRadiationsControlesType::class, $decisionsRadiationsControle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($decisionsRadiationsControle);
            $entityManager->flush();
            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');
            return $this->redirectToRoute('decisions_radiations_controles_index');
        }

        return $this->render('decisions_radiations_controles/new.html.twig', [
            'decisions_radiations_controle' => $decisionsRadiationsControle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decisions_radiations_controles_show", methods={"GET"})
     */
    public function show(DecisionsRadiationsControles $decisionsRadiationsControle): Response
    {
        return $this->render('decisions_radiations_controles/show.html.twig', [
            'decisions_radiations_controle' => $decisionsRadiationsControle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="decisions_radiations_controles_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DecisionsRadiationsControles $decisionsRadiationsControle): Response
    {
        $form = $this->createForm(DecisionsRadiationsControlesType::class, $decisionsRadiationsControle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'La modification a été effectuée avec succès.');
            return $this->redirectToRoute('decisions_radiations_controles_index');
        }

        return $this->render('decisions_radiations_controles/edit.html.twig', [
            'decisions_radiations_controle' => $decisionsRadiationsControle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="decisions_radiations_controles_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DecisionsRadiationsControles $decisionsRadiationsControle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$decisionsRadiationsControle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($decisionsRadiationsControle);
            $entityManager->flush();
            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('decisions_radiations_controles_index');
    }
}
