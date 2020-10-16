<?php

namespace App\Repository;

use App\Entity\TypesCommunes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypesCommunes|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypesCommunes|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypesCommunes[]    findAll()
 * @method TypesCommunes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypesCommunesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypesCommunes::class);
    }

    /**
     * @return TypesCommunes[] Returns an array of TypesCommunes objects
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
    //  * @return TypesCommunes[] Returns an array of TypesCommunes objects
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
    public function findOneBySomeField($value): ?TypesCommunes
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
