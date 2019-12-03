<?php

namespace App\Repository;

use App\Entity\ExConjoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

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
