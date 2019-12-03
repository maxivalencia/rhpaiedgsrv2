<?php

namespace App\Repository;

use App\Entity\DecorationsPersonnels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DecorationsPersonnels|null find($id, $lockMode = null, $lockVersion = null)
 * @method DecorationsPersonnels|null findOneBy(array $criteria, array $orderBy = null)
 * @method DecorationsPersonnels[]    findAll()
 * @method DecorationsPersonnels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DecorationsPersonnelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DecorationsPersonnels::class);
    }

    // /**
    //  * @return DecorationsPersonnels[] Returns an array of DecorationsPersonnels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DecorationsPersonnels
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
