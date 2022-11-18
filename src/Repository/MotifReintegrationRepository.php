<?php

namespace App\Repository;

use App\Entity\MotifReintegration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MotifReintegration|null find($id, $lockMode = null, $lockVersion = null)
 * @method MotifReintegration|null findOneBy(array $criteria, array $orderBy = null)
 * @method MotifReintegration[]    findAll()
 * @method MotifReintegration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MotifReintegrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MotifReintegration::class);
    }

    // /**
    //  * @return MotifReintegration[] Returns an array of MotifReintegration objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MotifReintegration
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
