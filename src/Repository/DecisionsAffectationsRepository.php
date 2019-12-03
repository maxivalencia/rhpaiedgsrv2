<?php

namespace App\Repository;

use App\Entity\DecisionsAffectations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DecisionsAffectations|null find($id, $lockMode = null, $lockVersion = null)
 * @method DecisionsAffectations|null findOneBy(array $criteria, array $orderBy = null)
 * @method DecisionsAffectations[]    findAll()
 * @method DecisionsAffectations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DecisionsAffectationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DecisionsAffectations::class);
    }

    // /**
    //  * @return DecisionsAffectations[] Returns an array of DecisionsAffectations objects
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
    public function findOneBySomeField($value): ?DecisionsAffectations
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
