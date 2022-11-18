<?php

namespace App\Repository;

use App\Entity\DetailsMotifsReintegration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DetailsMotifsReintegration|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailsMotifsReintegration|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailsMotifsReintegration[]    findAll()
 * @method DetailsMotifsReintegration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailsMotifsReintegrationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetailsMotifsReintegration::class);
    }

    // /**
    //  * @return DetailsMotifsReintegration[] Returns an array of DetailsMotifsReintegration objects
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
    public function findOneBySomeField($value): ?DetailsMotifsReintegration
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
