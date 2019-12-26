<?php

namespace App\Repository;

use App\Entity\Punitions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Punitions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Punitions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Punitions[]    findAll()
 * @method Punitions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PunitionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Punitions::class);
    }

    /**
     * @return Punitions[] Returns an array of Punitions objects
     */
    public function rechercher($value)
    {
        $valuedate = explode("/", $value);
        $date = '';
        if(!empty($valuedate[2]) && empty($valuedate[3])){
            $date = $valuedate[2]."-".$valuedate[1]."-".$valuedate[0];
        }    
        return $this->createQueryBuilder('p')
            ->andWhere('p.libelle LIKE :val')
            ->orWhere('p.reference LIKE :val')
            ->orWhere('p.date_reference = :valdate')
            ->orWhere('p.date_effet = :valdate')
            ->orWhere('p.sanction LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->setParameter('valdate', date_create($date))
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Punitions[] Returns an array of Punitions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Punitions
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
