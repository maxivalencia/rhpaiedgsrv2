<?php

namespace App\Repository;

use App\Entity\NotesPersonnels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NotesPersonnels|null find($id, $lockMode = null, $lockVersion = null)
 * @method NotesPersonnels|null findOneBy(array $criteria, array $orderBy = null)
 * @method NotesPersonnels[]    findAll()
 * @method NotesPersonnels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotesPersonnelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotesPersonnels::class);
    }

    // /**
    //  * @return NotesPersonnels[] Returns an array of NotesPersonnels objects
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
    public function findOneBySomeField($value): ?NotesPersonnels
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
