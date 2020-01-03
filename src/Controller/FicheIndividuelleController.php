<?php

namespace App\Controller;

use App\Entity\Personnels;
use App\Form\PersonnelsType;
use App\Repository\AffectationsPersonnelsRepository;
use App\Repository\ConjointsRepository;
use App\Repository\DecorationsPersonnelsRepository;
use App\Repository\DecorationsRepository;
use App\Repository\DiplomesPersonnelsRepository;
use App\Repository\DiplomesRepository;
use App\Repository\EnfantsRepository;
use App\Repository\ExConjointsRepository;
use App\Repository\FonctionsConjointsRepository;
use App\Repository\GradesRepository;
use App\Repository\NominationsPersonnelsRepository;
use App\Repository\PermissionsRepository;
use App\Repository\PersonnelsRepository;
use App\Repository\PhotosRepository;
use App\Repository\PunitionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Dompdf\Dompdf;
use Dompdf\Options;

class FicheIndividuelleController extends AbstractController
{
    /**
     * @Route("/fiche/individuelle/{id}", name="fiche_individuelle")
     */
    public function index(int $id, PersonnelsRepository $personnelsRepository, Personnels $personnel, FonctionsConjointsRepository $fonctionsConjointsRepository, PhotosRepository $photosRepository, ConjointsRepository $conjointsRepository, EnfantsRepository $enfantsRepository, DiplomesPersonnelsRepository $diplomesPersonnelsRepository, DecorationsPersonnelsRepository $decorationsPersonnelsRepository, AffectationsPersonnelsRepository $affectationsPersonnelsRepository, NominationsPersonnelsRepository $nominationsPersonnelsRepository)//: Response
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($pdfOptions);
        $personnel = $personnelsRepository->findOneBy(['id' => $id]);
        $photo = $photosRepository->findOneBy(['personnel' => $personnel]);
        $conjoints = $conjointsRepository->findOneBy(["personnel" => $personnel], ["id" => "DESC"]);
        //$conjoint = $conjointsRepository->findOneBy(["personnel" => $personnel], ["id" => "DESC"]);
        //$fonctionConjoint = $fonctionsConjointsRepository->findOneBy(["conjoint" => $conjoint], ["id" => "DESC"]);
        $fonctionConjoint = $fonctionsConjointsRepository->findAll();
        $enfants = $enfantsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $diplomes = $diplomesPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $decorations = $decorationsPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $affectations = $affectationsPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $nominations = $nominationsPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);


        $date = new \DateTime();
        $logo = $this->getParameter('logo').'/logo_dgsr.png';
        $sary = $this->getParameter('photo').'/'.$photo;
        $html = $this->renderView('fiche_individuelle/index.html.twig', [
            'logo' => $logo,
            'date' => $date,
            'personnel' => $personnel,
            'photo' => $photo,
            'sary' => $sary,
            'conjoints' => $conjoints,
            'enfants' => $enfants,
            'diplomes' => $diplomes,
            'decorations' => $decorations,
            'affectations' => $affectations,
            'nominations' => $nominations,
            'fonctionConjoints' => $fonctionConjoint,
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Fiche_Individuelle_".$personnel->getNom().'_'.$personnel->getPrenoms().".pdf", [
            "Attachment" => true
        ]);
    }
}
