<?php

namespace App\Repository;

use App\Entity\DecisionsRadiationsControles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DecisionsRadiationsControles|null find($id, $lockMode = null, $lockVersion = null)
 * @method DecisionsRadiationsControles|null findOneBy(array $criteria, array $orderBy = null)
 * @method DecisionsRadiationsControles[]    findAll()
 * @method DecisionsRadiationsControles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DecisionsRadiationsControlesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DecisionsRadiationsControles::class);
    }

    // /**
    //  * @return DecisionsRadiationsControles[] Returns an array of DecisionsRadiationsControles objects
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
    public function findOneBySomeField($value): ?DecisionsRadiationsControles
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
