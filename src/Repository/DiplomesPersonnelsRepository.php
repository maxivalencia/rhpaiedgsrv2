<?php

namespace App\Repository;

use App\Entity\DiplomesPersonnels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DiplomesPersonnels|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiplomesPersonnels|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiplomesPersonnels[]    findAll()
 * @method DiplomesPersonnels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiplomesPersonnelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiplomesPersonnels::class);
    }

    // /**
    //  * @return DiplomesPersonnels[] Returns an array of DiplomesPersonnels objects
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
    public function findOneBySomeField($value): ?DiplomesPersonnels
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
