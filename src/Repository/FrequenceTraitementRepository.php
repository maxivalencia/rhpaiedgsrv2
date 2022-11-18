<?php

namespace App\Repository;

use App\Entity\FrequenceTraitement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FrequenceTraitement|null find($id, $lockMode = null, $lockVersion = null)
 * @method FrequenceTraitement|null findOneBy(array $criteria, array $orderBy = null)
 * @method FrequenceTraitement[]    findAll()
 * @method FrequenceTraitement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrequenceTraitementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FrequenceTraitement::class);
    }

    // /**
    //  * @return FrequenceTraitement[] Returns an array of FrequenceTraitement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FrequenceTraitement
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
