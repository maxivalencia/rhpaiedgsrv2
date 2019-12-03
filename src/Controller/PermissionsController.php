<?php

namespace App\Controller;

use App\Entity\Permissions;
use App\Form\PermissionsType;
use App\Repository\PermissionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/permissions")
 */
class PermissionsController extends AbstractController
{
    /**
     * @Route("/", name="permissions_index", methods={"GET"})
     */
    public function index(PermissionsRepository $permissionsRepository): Response
    {
        return $this->render('permissions/index.html.twig', [
            'permissions' => $permissionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="permissions_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $permission = new Permissions();
        $form = $this->createForm(PermissionsType::class, $permission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($permission);
            $entityManager->flush();

            return $this->redirectToRoute('permissions_index');
        }

        return $this->render('permissions/new.html.twig', [
            'permission' => $permission,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="permissions_show", methods={"GET"})
     */
    public function show(Permissions $permission): Response
    {
        return $this->render('permissions/show.html.twig', [
            'permission' => $permission,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="permissions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Permissions $permission): Response
    {
        $form = $this->createForm(PermissionsType::class, $permission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('permissions_index');
        }

        return $this->render('permissions/edit.html.twig', [
            'permission' => $permission,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="permissions_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Permissions $permission): Response
    {
        if ($this->isCsrfTokenValid('delete'.$permission->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($permission);
            $entityManager->flush();
        }

        return $this->redirectToRoute('permissions_index');
    }
}
