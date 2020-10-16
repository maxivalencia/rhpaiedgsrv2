<?php

namespace App\Repository;

use App\Entity\Decorations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Decorations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Decorations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Decorations[]    findAll()
 * @method Decorations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DecorationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Decorations::class);
    }

    /**
     * @return Decorations[] Returns an array of Decorations objects
     */
    public function rechercher($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.libelle LIKE :val')
            ->orWhere('d.abbreviation LIKE :val')
            ->orWhere('d.ordre LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Decorations[] Returns an array of Decorations objects
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
    public function findOneBySomeField($value): ?Decorations
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
