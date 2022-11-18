<?php

namespace App\Repository;

use App\Entity\SuivieApresTraitement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SuivieApresTraitement|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuivieApresTraitement|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuivieApresTraitement[]    findAll()
 * @method SuivieApresTraitement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuivieApresTraitementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuivieApresTraitement::class);
    }

    // /**
    //  * @return SuivieApresTraitement[] Returns an array of SuivieApresTraitement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SuivieApresTraitement
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
