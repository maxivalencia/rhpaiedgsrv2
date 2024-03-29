<?php

namespace App\Repository;

use App\Entity\Personnels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @method Personnels|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personnels|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personnels[]    findAll()
 * @method Personnels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personnels::class);
    }

    /**
     * @return Personnels[] Returns an array of Personnels objects
     */
    public function rechercher($value)
    {
        $valuedate = explode("/", $value);
        $date = $valuedate[2]."-".$valuedate[1]."-".$valuedate[0];
        return $this->createQueryBuilder('p')
            ->Where('p.nom LIKE :val')
            ->orWhere('p.prenoms LIKE :val')
            ->orWhere('p.date_naissance = :valdate')
            ->orWhere('p.lieu_naissance LIKE :val')
            ->orWhere('p.nom_pere LIKE :val')
            ->orWhere('p.nom_mere LIKE :val')
            ->orWhere('p.num_cin LIKE :val')
            ->orWhere('p.date_cin = :valdate')
            ->orWhere('p.lieu_cin LIKE :val')
            ->orWhere('p.adresse LIKE :val')
            ->orWhere('p.telephone LIKE :val')
            ->orWhere('p.telephone_ice LIKE :val')
            ->orWhere('p.date_embauche = :valdate')
            ->orWhere('p.matricule LIKE :val')
            ->orWhere('p.numero_cnaps LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->setParameter('valdate', date_create($date))
            ->orderBy('p.nom', 'DESC')
            //->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Personnels[] Returns an array of Personnels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Personnels
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
