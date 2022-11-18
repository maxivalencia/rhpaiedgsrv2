<?php

namespace App\Controller;

use App\Entity\SuivieApresTraitement;
use App\Form\SuivieApresTraitementType;
use App\Repository\SuivieApresTraitementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/suivie/apres/traitement")
 */
class SuivieApresTraitementController extends AbstractController
{
    /**
     * @Route("/", name="suivie_apres_traitement_index", methods={"GET"})
     */
    public function index(SuivieApresTraitementRepository $suivieApresTraitementRepository): Response
    {
        return $this->render('suivie_apres_traitement/index.html.twig', [
            'suivie_apres_traitements' => $suivieApresTraitementRepository->findBy([], ["id" => "DESC"]),
        ]);
    }

    /**
     * @Route("/new", name="suivie_apres_traitement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $suivieApresTraitement = new SuivieApresTraitement();
        $form = $this->createForm(SuivieApresTraitementType::class, $suivieApresTraitement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($suivieApresTraitement);
            $entityManager->flush();

            return $this->redirectToRoute('suivie_apres_traitement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('suivie_apres_traitement/new.html.twig', [
            'suivie_apres_traitement' => $suivieApresTraitement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="suivie_apres_traitement_show", methods={"GET"})
     */
    public function show(SuivieApresTraitement $suivieApresTraitement): Response
    {
        return $this->render('suivie_apres_traitement/show.html.twig', [
            'suivie_apres_traitement' => $suivieApresTraitement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="suivie_apres_traitement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SuivieApresTraitement $suivieApresTraitement): Response
    {
        $form = $this->createForm(SuivieApresTraitementType::class, $suivieApresTraitement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('suivie_apres_traitement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('suivie_apres_traitement/edit.html.twig', [
            'suivie_apres_traitement' => $suivieApresTraitement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="suivie_apres_traitement_delete", methods={"POST"})
     */
    public function delete(Request $request, SuivieApresTraitement $suivieApresTraitement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$suivieApresTraitement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($suivieApresTraitement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('suivie_apres_traitement_index', [], Response::HTTP_SEE_OTHER);
    }
}
