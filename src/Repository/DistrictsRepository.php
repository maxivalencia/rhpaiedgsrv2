<?php

namespace App\Repository;

use App\Entity\Districts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Districts|null find($id, $lockMode = null, $lockVersion = null)
 * @method Districts|null findOneBy(array $criteria, array $orderBy = null)
 * @method Districts[]    findAll()
 * @method Districts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DistrictsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Districts::class);
    }

    /**
     * @return Districts[] Returns an array of Districts objects
     */
    public function rechercher($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.district LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Districts[] Returns an array of Districts objects
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
    public function findOneBySomeField($value): ?Districts
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
