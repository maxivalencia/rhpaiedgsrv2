<?php

namespace App\Controller;

use App\Entity\Photos;
use App\Form\PhotosType;
use App\Repository\PhotosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Validator\Constraints\File;

/**
 * @Route("/photos")
 */
class PhotosController extends AbstractController
{
    /**
     * @Route("/", name="photos_index", methods={"GET"})
     */
    public function index(PhotosRepository $photosRepository, Request $request, PaginatorInterface $paginator): Response
    {
        return $this->render('photos/index.html.twig', [
            'photos' => $photosRepository->findBy([], ["id" => "DESC"]),
        ]);
    }
    /**
     * @Route("/recherche", name="photos_recherche", methods={"GET"})
     */
    public function recherche(PhotosRepository $photosRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $photosRepository->rechercher($request->query->get('search')), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );
        return $this->render('photos/index.html.twig', [
            'photos' => $pagination,
        ]);
    }

    /**
     * @Route("/new", name="photos_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $photo = new Photos();
        $form = $this->createForm(PhotosType::class, $photo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photoFile = $form['image']->getData();
            if ($photoFile) {
                $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();
                $photoFile->move(
                    $this->getParameter('photo'),
                    $newFilename
                );
                
                $entityManager = $this->getDoctrine()->getManager();
                $photo->setPhoto($newFilename);
                //$photo->setTaille();
                //$photo->setType();
                $entityManager->persist($photo);
                $entityManager->flush();
            }

            return $this->redirectToRoute('photos_index');
        }

        return $this->render('photos/new.html.twig', [
            'photo' => $photo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photos_show", methods={"GET"})
     */
    public function show(Photos $photo): Response
    {
        return $this->render('photos/show.html.twig', [
            'photo' => $photo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="photos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Photos $photo): Response
    {
        $form = $this->createForm(PhotosType::class, $photo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {            
            $photoFile = $form['image']->getData();
            if ($photoFile) {
                $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();
                $photoFile->move(
                    $this->getParameter('photo'),
                    $newFilename
                );
                
                $entityManager = $this->getDoctrine()->getManager();
                $photo->setPhoto($newFilename);
                //$photo->setTaille();
                //$photo->setType();
                $entityManager->persist($photo);
                $entityManager->flush();
            }
            //$this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('photos_index');
        }

        return $this->render('photos/edit.html.twig', [
            'photo' => $photo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photos_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Photos $photo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($photo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('photos_index');
    }
}
