<?php

namespace App\Repository;

use App\Entity\SituationSanitaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SituationSanitaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method SituationSanitaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method SituationSanitaire[]    findAll()
 * @method SituationSanitaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SituationSanitaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SituationSanitaire::class);
    }

    // /**
    //  * @return SituationSanitaire[] Returns an array of SituationSanitaire objects
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
    public function findOneBySomeField($value): ?SituationSanitaire
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
