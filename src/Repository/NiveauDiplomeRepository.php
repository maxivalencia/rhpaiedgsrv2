<?php

namespace App\Repository;

use App\Entity\NiveauDiplome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NiveauDiplome|null find($id, $lockMode = null, $lockVersion = null)
 * @method NiveauDiplome|null findOneBy(array $criteria, array $orderBy = null)
 * @method NiveauDiplome[]    findAll()
 * @method NiveauDiplome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NiveauDiplomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NiveauDiplome::class);
    }

    // /**
    //  * @return NiveauDiplome[] Returns an array of NiveauDiplome objects
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
    public function findOneBySomeField($value): ?NiveauDiplome
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
