<?php

namespace App\Repository;

use App\Entity\TypesContrats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypesContrats|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypesContrats|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypesContrats[]    findAll()
 * @method TypesContrats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypesContratsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypesContrats::class);
    }

    /**
     * @return TypesContrats[] Returns an array of TypesContrats objects
     */
    public function rechercher($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.type LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return TypesContrats[] Returns an array of TypesContrats objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypesContrats
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
