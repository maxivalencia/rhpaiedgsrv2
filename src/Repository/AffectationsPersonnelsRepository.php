<?php

namespace App\Repository;

use App\Entity\AffectationsPersonnels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AffectationsPersonnels|null find($id, $lockMode = null, $lockVersion = null)
 * @method AffectationsPersonnels|null findOneBy(array $criteria, array $orderBy = null)
 * @method AffectationsPersonnels[]    findAll()
 * @method AffectationsPersonnels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AffectationsPersonnelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AffectationsPersonnels::class);
    }

    /**
     * @return AffectationsPersonnels[] Returns an array of AffectationsPersonnels objects
     */
    public function recherche($value)
    {
        $valuedate = explode("/", $value);
        $date = $valuedate[2]."-".$valuedate[1]."-".$valuedate[0];
        return $this->createQueryBuilder('a')
            ->andWhere('a.date_affectation = :valdate')
            ->orWhere('a.date_disponibilite = :valdate')
            ->orWhere('a.reference_disponibilite LIKE :val')
            ->orWhere('a.date_reference_disponibilite = :valdate')
            ->orWhere('a.motif_affectation LIKE :val')
            ->orWhere('a.situation LIKE :val')
            ->orWhere('a.motif_annulation LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->setParameter('valdate', date_create($date))
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return AffectationsPersonnels[] Returns an array of AffectationsPersonnels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AffectationsPersonnels
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
