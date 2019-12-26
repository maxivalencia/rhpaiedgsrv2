<?php

namespace App\Repository;

use App\Entity\FonctionsConjoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FonctionsConjoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method FonctionsConjoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method FonctionsConjoints[]    findAll()
 * @method FonctionsConjoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FonctionsConjointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FonctionsConjoints::class);
    }

    /**
     * @return FonctionsConjoints[] Returns an array of FonctionsConjoints objects
     */
    public function rechercher($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.libelle LIKE :val')
            ->orWhere('f.abbreviation LIKE :val')
            ->orWhere('f.lieu_travail LIKE :val')
            ->orWhere('f.employeur LIKE :val')
            ->orWhere('f.adresse_employeur LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return FonctionsConjoints[] Returns an array of FonctionsConjoints objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FonctionsConjoints
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
