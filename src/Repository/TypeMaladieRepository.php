<?php

namespace App\Repository;

use App\Entity\TypeMaladie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeMaladie|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeMaladie|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeMaladie[]    findAll()
 * @method TypeMaladie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeMaladieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeMaladie::class);
    }

    // /**
    //  * @return TypeMaladie[] Returns an array of TypeMaladie objects
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
    public function findOneBySomeField($value): ?TypeMaladie
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
