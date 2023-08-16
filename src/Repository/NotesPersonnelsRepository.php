<?php

namespace App\Repository;

use App\Entity\NotesPersonnels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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

    /**
     * @return NotesPersonnels[] Returns an array of NotesPersonnels objects
     */
    public function rechercher($value)
    {
        $valuedate = explode("/", $value);
        $date = '';
        if(!empty($valuedate[2]) && empty($valuedate[3])){
            $date = $valuedate[2]."-".$valuedate[1]."-".$valuedate[0];
        }  
        return $this->createQueryBuilder('n')
            ->andWhere('n.date_note = :valdate')
            ->orWhere('n.note LIKE :val')
            ->orWhere('n.appreciation_global LIKE :val')
            ->orWhere('n.reference_note LIKE :val')
            ->orWhere('n.date_reference = :valdate')
            ->setParameter('val', '%'.$value.'%')
            ->setParameter('valdate', date_create($date))
            ->orderBy('n.date_note', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
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
