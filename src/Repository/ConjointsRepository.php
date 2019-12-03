<?php

namespace App\Repository;

use App\Entity\Conjoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Conjoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conjoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conjoints[]    findAll()
 * @method Conjoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConjointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conjoints::class);
    }

    // /**
    //  * @return Conjoints[] Returns an array of Conjoints objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Conjoints
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
