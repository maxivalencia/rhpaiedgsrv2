<?php

namespace App\Repository;

use App\Entity\DecisionReintegration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DecisionReintegration|null find($id, $lockMode = null, $lockVersion = null)
 * @method DecisionReintegration|null findOneBy(array $criteria, array $orderBy = null)
 * @method DecisionReintegration[]    findAll()
 * @method DecisionReintegration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DecisionReintegrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DecisionReintegration::class);
    }

    // /**
    //  * @return DecisionReintegration[] Returns an array of DecisionReintegration objects
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
    public function findOneBySomeField($value): ?DecisionReintegration
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
