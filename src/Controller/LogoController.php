<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;

class LogoController extends AbstractController
{
    /**
     * @Route("/slogo", name="logo")
     */
    public function index(Request $request)
    {
        $defaultData = ["message" => "Ajouter votre logo içi"];
        $form = $this->createFormBuilder($defaultData)
            ->add('logo', FileType::class, [
                'label' => 'Nouveau logo',
                'data_class' => null,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'application/png',
                            'application/jpeg',
                            'application/jpg',
                        ],
                        'mimeTypesMessage' => 'Veuillez entrer un des format valide',
                    ])
                ],
            ])
            ->add('Ajouter', SubmitType::class, [
                'label' => 'Ajouter',
            ])
            ->getForm();
        //$form = $this->createForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            //$data = $form->getData();
            $photoFile = $form['logo']->getData();
            if ($photoFile) {
                $photoFile->move(
                    $this->getParameter('logo'),
                    'logo_dgsr.png'
                );
            }
            return $this->redirectToRoute('logo');
        }
        return $this->render('logo/index.html.twig', [
            'controller_name' => 'LogoController',
            'form' => $form->createView(),
        ]);
    }
}
