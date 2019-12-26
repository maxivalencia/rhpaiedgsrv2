<?php

namespace App\Repository;

use App\Entity\MotifsRadiationsControles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MotifsRadiationsControles|null find($id, $lockMode = null, $lockVersion = null)
 * @method MotifsRadiationsControles|null findOneBy(array $criteria, array $orderBy = null)
 * @method MotifsRadiationsControles[]    findAll()
 * @method MotifsRadiationsControles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MotifsRadiationsControlesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MotifsRadiationsControles::class);
    }

    /**
     * @return MotifsRadiationsControles[] Returns an array of MotifsRadiationsControles objects
     */
    public function rechercher($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.libelle LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return MotifsRadiationsControles[] Returns an array of MotifsRadiationsControles objects
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
    public function findOneBySomeField($value): ?MotifsRadiationsControles
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
