<?php

namespace App\Repository;

use App\Entity\NotesPOS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NotesPOS|null find($id, $lockMode = null, $lockVersion = null)
 * @method NotesPOS|null findOneBy(array $criteria, array $orderBy = null)
 * @method NotesPOS[]    findAll()
 * @method NotesPOS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotesPOSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotesPOS::class);
    }

    // /**
    //  * @return NotesPOS[] Returns an array of NotesPOS objects
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
    public function findOneBySomeField($value): ?NotesPOS
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
