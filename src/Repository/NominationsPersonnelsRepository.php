<?php

namespace App\Repository;

use App\Entity\NominationsPersonnels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NominationsPersonnels|null find($id, $lockMode = null, $lockVersion = null)
 * @method NominationsPersonnels|null findOneBy(array $criteria, array $orderBy = null)
 * @method NominationsPersonnels[]    findAll()
 * @method NominationsPersonnels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NominationsPersonnelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NominationsPersonnels::class);
    }

    // /**
    //  * @return NominationsPersonnels[] Returns an array of NominationsPersonnels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NominationsPersonnels
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
