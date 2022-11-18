<?php

namespace App\Repository;

use App\Entity\Proche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Proche|null find($id, $lockMode = null, $lockVersion = null)
 * @method Proche|null findOneBy(array $criteria, array $orderBy = null)
 * @method Proche[]    findAll()
 * @method Proche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProcheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Proche::class);
    }

    // /**
    //  * @return Proche[] Returns an array of Proche objects
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
    public function findOneBySomeField($value): ?Proche
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
