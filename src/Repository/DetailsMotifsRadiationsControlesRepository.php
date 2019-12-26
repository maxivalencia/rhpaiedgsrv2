<?php

namespace App\Repository;

use App\Entity\DetailsMotifsRadiationsControles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DetailsMotifsRadiationsControles|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailsMotifsRadiationsControles|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailsMotifsRadiationsControles[]    findAll()
 * @method DetailsMotifsRadiationsControles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailsMotifsRadiationsControlesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetailsMotifsRadiationsControles::class);
    }

    /**
     * @return DetailsMotifsRadiationsControles[] Returns an array of DetailsMotifsRadiationsControles objects
     */
    public function rechercher($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.detail_motif_radiation LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return DetailsMotifsRadiationsControles[] Returns an array of DetailsMotifsRadiationsControles objects
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
    public function findOneBySomeField($value): ?DetailsMotifsRadiationsControles
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
