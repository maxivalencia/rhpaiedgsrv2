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
use App\Repository\SituationSanitaireRepository;
use App\Repository\RecompenseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Dompdf\Dompdf;
use Dompdf\Options;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Exception;


class FicheIndividuelleController extends AbstractController
{
    /**
     * @Route("/fiche/individuelle/{id}", name="fiche_individuelle")
     */
    public function index(int $id, RecompenseRepository $recompenseRepository, SituationSanitaireRepository $situationSanitaireRepository, PersonnelsRepository $personnelsRepository, Personnels $personnel, FonctionsConjointsRepository $fonctionsConjointsRepository, PhotosRepository $photosRepository, ConjointsRepository $conjointsRepository, EnfantsRepository $enfantsRepository, DiplomesPersonnelsRepository $diplomesPersonnelsRepository, DecorationsPersonnelsRepository $decorationsPersonnelsRepository, AffectationsPersonnelsRepository $affectationsPersonnelsRepository, NominationsPersonnelsRepository $nominationsPersonnelsRepository)//: Response
    {
        $pdfOptions = new Options();
        $pdfOptions->set('isRemoteEnabled', true);
        $pdfOptions->setIsRemoteEnabled(true);
        $pdfOptions->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($pdfOptions);
        $personnel = $personnelsRepository->findOneBy(['id' => $id]);
        $photo = $photosRepository->findOneBy(['personnel' => $personnel], ["id" => "DESC"]);
        $conjoints = $conjointsRepository->findOneBy(["personnel" => $personnel], ["id" => "DESC"]);
        $conjoint = $conjointsRepository->findOneBy(["personnel" => $personnel], ["id" => "DESC"]);
        $fonctionConjoint = $fonctionsConjointsRepository->findOneBy(["conjoint" => $conjoint], ["id" => "DESC"]);
        //$fonctionConjoint = $fonctionsConjointsRepository->findAll();
        $enfants = $enfantsRepository->findBy(["personnel" => $personnel], ["date_naissance" => "ASC"]);
        $diplomes = $diplomesPersonnelsRepository->findBy(["personnel" => $personnel], ["date" => "DESC"]);
        $decorations = $decorationsPersonnelsRepository->findBy(["personnel" => $personnel], ["date" => "DESC"]);
        $affectations = $affectationsPersonnelsRepository->findBy(["personnel" => $personnel], ["date_affectation" => "DESC"]);
        $nominations = $nominationsPersonnelsRepository->findBy(["personnel" => $personnel], ["date_nomination" => "DESC"]);
        $situationSanitaires = $situationSanitaireRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $recompenses = $recompenseRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);

        $date = new \DateTime();
        $logo = $this->getParameter('logo').'logo_dgsr.png';
        $sary = $this->getParameter('photo').$photo;
        // Ouvrir le fichier
        $check = @fopen($sary, 'r');
        // Vérifier si le fichier existe
        if(!$check || $photo == null){
            $sary = $this->getParameter('photo')."default.png";
            //$sary = "default.png";
        }else{
            //$sary = $photo->getPhoto();
            try{
                $sary = $this->getParameter('photo').$photo->getPhoto();
            }
            catch(Exception $e) {
                $sary = $this->getParameter('photo')."default.png";
            }
        }

        $logo_data = base64_encode(file_get_contents($logo));
        $logo_src = 'data:image/png;base64,'.$logo_data;
        //$logo_src = 'data:'.fileMimeType($logo).';base64,'.$logo_data;
        $sary_data = base64_encode(file_get_contents($sary));
        $saryexplodes = explode('.', $sary);
        $saryextension = '';
        foreach($saryexplodes as $saryexplode){
            $saryextension = $saryexplode;
        }
        //$sary_src = 'data:image/jpeg;base64,'.$sary_data;
        $sary_src = 'data:image/'.$saryextension.';base64,'.$sary_data;
        //$sary_src = 'data:image/'.mime_content_type($sary).';base64,'.$sary_data;

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
            'logos' => $logo_src,
            'sarypersonnel' => $sary_src,
            'situationSanitaires' => $situationSanitaires,
            'recompenses' => $recompenses,
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Fiche_Individuelle_".$personnel->getNom().'_'.$personnel->getPrenoms().".pdf", [
            "Attachment" => true,
        ]);
    }
    
    /**
     * @Route("/fiche/individues/{id}", name="individue")
     */
    public function individue(int $id, PersonnelsRepository $personnelsRepository, Personnels $personnel, FonctionsConjointsRepository $fonctionsConjointsRepository, PhotosRepository $photosRepository, ConjointsRepository $conjointsRepository, EnfantsRepository $enfantsRepository, DiplomesPersonnelsRepository $diplomesPersonnelsRepository, DecorationsPersonnelsRepository $decorationsPersonnelsRepository, AffectationsPersonnelsRepository $affectationsPersonnelsRepository, NominationsPersonnelsRepository $nominationsPersonnelsRepository): Response
    {
        $personnel = $personnelsRepository->findOneBy(['id' => $id]);
        $photo = $photosRepository->findOneBy(['personnel' => $personnel]);
        $conjoints = $conjointsRepository->findOneBy(["personnel" => $personnel], ["id" => "DESC"]);
        //$conjoint = $conjointsRepository->findOneBy(["personnel" => $personnel], ["id" => "DESC"]);
        //$fonctionConjoint = $fonctionsConjointsRepository->findOneBy(["conjoint" => $conjoint], ["id" => "DESC"]);
        $fonctionConjoint = $fonctionsConjointsRepository->findOneBy(["conjoint" => $conjoints], ["id" => "DESC"]);
        $enfants = $enfantsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $diplomes = $diplomesPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $decorations = $decorationsPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $affectations = $affectationsPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $nominations = $nominationsPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);

        $date = new \DateTime();
        $logo = $this->getParameter('logo').'logo_dgsr.png';
        $sary = $this->getParameter('photo').$photo;
        // Ouvrir le fichier
        $check = @fopen($sary, 'r');
        // Vérifier si le fichier existe
        if(!$check){
            $sary = "default.png";
        }else{
            $sary = $photo->getPhoto();
        }

        $logo_data = base64_encode(file_get_contents($logo));
        //$logo_src = 'data: '.mime_content_type($logo).';base64,'.$logo_data;
        
        $sary_data = base64_encode(file_get_contents($sary));
        //$sary_src = $src = 'data: '.mime_content_type($sary).';base64,'.$sary_data;

        return $this->render('fiche_individuelle/index.html.twig', [
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
    }
    
    /**
     * @Route("/fiche/snappypdf/{id}", name="snappypdf")
     */
    public function snappypdf(int $id, PersonnelsRepository $personnelsRepository, Personnels $personnel, FonctionsConjointsRepository $fonctionsConjointsRepository, PhotosRepository $photosRepository, ConjointsRepository $conjointsRepository, EnfantsRepository $enfantsRepository, DiplomesPersonnelsRepository $diplomesPersonnelsRepository, DecorationsPersonnelsRepository $decorationsPersonnelsRepository, AffectationsPersonnelsRepository $affectationsPersonnelsRepository, NominationsPersonnelsRepository $nominationsPersonnelsRepository)
    {
        $personnel = $personnelsRepository->findOneBy(['id' => $id]);
        $photo = $photosRepository->findOneBy(['personnel' => $personnel]);
        $conjoints = $conjointsRepository->findOneBy(["personnel" => $personnel], ["id" => "DESC"]);
        $fonctionConjoint = $fonctionsConjointsRepository->findAll();
        $enfants = $enfantsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $diplomes = $diplomesPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $decorations = $decorationsPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $affectations = $affectationsPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);
        $nominations = $nominationsPersonnelsRepository->findBy(["personnel" => $personnel], ["id" => "DESC"]);

        $date = new \DateTime();
        $logo = $this->getParameter('logo').'logo_dgsr.png';
        $sary = $this->getParameter('photo').$photo;
        $html = $this->render('fiche_individuelle/index.html.twig', [
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

        /* return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            "Fiche_Individuelle_".$personnel->getNom().'_'.$personnel->getPrenoms().'.pdf'
        ); */
        $snappy = $this->get('knp_snappy.pdf');
        return new PdfResponse(
            $snappy->getOutputFromHtml($html),
            200,
            [ 
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'."Fiche_Individuelle_".$personnel->getNom().'_'.$personnel->getPrenoms().'.pdf"'
            ]
        );
    }
}
