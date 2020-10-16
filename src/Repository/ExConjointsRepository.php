<?php

namespace App\Repository;

use App\Entity\ExConjoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExConjoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExConjoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExConjoints[]    findAll()
 * @method ExConjoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExConjointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExConjoints::class);
    }

    /**
     * @return ExConjoints[] Returns an array of ExConjoints objects
     */
    public function rechercher($value)
    {
        $valuedate = explode("/", $value);
        $date = '';
        if(!empty($valuedate[2]) && empty($valuedate[3])){
            $date = $valuedate[2]."-".$valuedate[1]."-".$valuedate[0];
        }
        return $this->createQueryBuilder('e')
            ->andWhere('e.motif_rupture LIKE :val')
            ->orWhere('e.date_rupture = :valdate')
            ->orWhere('e.reference_rupture LIKE :val')
            ->orWhere('e.date_reference_rupture = :valdate')
            ->orWhere('e.adresse_veuve LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->setParameter('valdate', date_create($date))
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return ExConjoints[] Returns an array of ExConjoints objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExConjoints
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
