<?php

namespace App\Repository;

use App\Entity\Diplomes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Diplomes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Diplomes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Diplomes[]    findAll()
 * @method Diplomes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiplomesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Diplomes::class);
    }

    /**
     * @return Diplomes[] Returns an array of Diplomes objects
     */
    public function rechercher($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.libelle LIKE :val')
            ->orWhere('d.abbreviation LIKE :val')
            ->orWhere('d.type LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Diplomes[] Returns an array of Diplomes objects
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
    public function findOneBySomeField($value): ?Diplomes
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
