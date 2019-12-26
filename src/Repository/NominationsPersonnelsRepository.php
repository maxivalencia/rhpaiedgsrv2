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

    /**
     * @return NominationsPersonnels[] Returns an array of NominationsPersonnels objects
     */
    public function rechercher($value)
    {
        $valuedate = explode("/", $value);
        $date = '';
        if(!empty($valuedate[2]) && empty($valuedate[3])){
            $date = $valuedate[2]."-".$valuedate[1]."-".$valuedate[0];
        }  
        return $this->createQueryBuilder('n')
            ->andWhere('n.date_nomination = :valdate')
            ->orWhere('n.rang LIKE :val')
            ->orWhere('n.echelon LIKE :val')
            ->orWhere('n.class LIKE :val')
            ->orWhere('n.indice LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->setParameter('valdate', date_create($date))
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
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
