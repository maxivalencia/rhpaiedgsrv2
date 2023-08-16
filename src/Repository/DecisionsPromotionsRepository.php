<?php

namespace App\Repository;

use App\Entity\DecisionsPromotions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DecisionsPromotions|null find($id, $lockMode = null, $lockVersion = null)
 * @method DecisionsPromotions|null findOneBy(array $criteria, array $orderBy = null)
 * @method DecisionsPromotions[]    findAll()
 * @method DecisionsPromotions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DecisionsPromotionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DecisionsPromotions::class);
    }

    /**
     * @return DecisionsPromotions[] Returns an array of DecisionsPromotions objects
     */
    public function rechercher($value)
    {
        $valuedate = explode("/", $value);
        $date = '';
        if(!empty($valuedate[2]) && empty($valuedate[3])){
            $date = $valuedate[2]."-".$valuedate[1]."-".$valuedate[0];
        }
        return $this->createQueryBuilder('d')
            ->andWhere('d.reference_decision LIKE :val')
            ->orWhere('d.date_decision = :valdate')
            ->orWhere('d.genre_decision LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->setParameter('valdate', date_create($date))
            ->orderBy('d.date_decision', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return DecisionsPromotions[] Returns an array of DecisionsPromotions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DecisionsPromotions
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
