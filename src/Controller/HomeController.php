<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fonctions/conjoints")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage", methods={"GET"})
     */
    public function index():Response
    {
        if(!empty($_SESSION['username']))
        {
            // à remplacer par le tableau de bord quand le tableau de bord sera mise en place
            return $this->redirectToRoute('personnels_index');
        } else 
        {
            return $this->redirectToRoute('app_login');
        }
    }
}