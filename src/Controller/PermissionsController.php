<?php

namespace App\Controller;

use App\Entity\Permissions;
use App\Form\PermissionsType;
use App\Repository\PermissionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/permissions")
 */
class PermissionsController extends AbstractController
{
    /**
     * @Route("/", name="permissions_index", methods={"GET"})
     */
    public function index(PermissionsRepository $permissionsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('permissions/index.html.twig', [
            'permissions' => $permissionsRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="permissions_recherche", methods={"GET"})
     */
    public function recherche(PermissionsRepository $permissionsRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $permissionsRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('permissions/index.html.twig', [
            'permissions' => $pagination,
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
            $this->addFlash('success', 'L\'ajout a été effectué avec succès.');
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
            $this->addFlash('success', 'La modification a été effectuée avec succès.');
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
            $this->addFlash('success', 'La suppression a été effectuée avec succès.');
        }

        return $this->redirectToRoute('permissions_index');
    }
}
