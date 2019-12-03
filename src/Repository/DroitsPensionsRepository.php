<?php

namespace App\Repository;

use App\Entity\DroitsPensions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DroitsPensions|null find($id, $lockMode = null, $lockVersion = null)
 * @method DroitsPensions|null findOneBy(array $criteria, array $orderBy = null)
 * @method DroitsPensions[]    findAll()
 * @method DroitsPensions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DroitsPensionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DroitsPensions::class);
    }

    // /**
    //  * @return DroitsPensions[] Returns an array of DroitsPensions objects
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
    public function findOneBySomeField($value): ?DroitsPensions
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
