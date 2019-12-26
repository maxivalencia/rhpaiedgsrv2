<?php

namespace App\Repository;

use App\Entity\DomaineDiplome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DomaineDiplome|null find($id, $lockMode = null, $lockVersion = null)
 * @method DomaineDiplome|null findOneBy(array $criteria, array $orderBy = null)
 * @method DomaineDiplome[]    findAll()
 * @method DomaineDiplome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DomaineDiplomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DomaineDiplome::class);
    }

    /**
     * @return DomaineDiplome[] Returns an array of DomaineDiplome objects
     */
    public function rechercher($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.libelle LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return DomaineDiplome[] Returns an array of DomaineDiplome objects
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
    public function findOneBySomeField($value): ?DomaineDiplome
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
