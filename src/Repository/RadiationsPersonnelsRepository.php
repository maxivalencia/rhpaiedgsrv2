<?php

namespace App\Repository;

use App\Entity\RadiationsPersonnels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RadiationsPersonnels|null find($id, $lockMode = null, $lockVersion = null)
 * @method RadiationsPersonnels|null findOneBy(array $criteria, array $orderBy = null)
 * @method RadiationsPersonnels[]    findAll()
 * @method RadiationsPersonnels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RadiationsPersonnelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RadiationsPersonnels::class);
    }

    // /**
    //  * @return RadiationsPersonnels[] Returns an array of RadiationsPersonnels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RadiationsPersonnels
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
