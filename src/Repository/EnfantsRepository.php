<?php

namespace App\Repository;

use App\Entity\Enfants;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Enfants|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enfants|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enfants[]    findAll()
 * @method Enfants[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnfantsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Enfants::class);
    }

    /**
     * @return Enfants[] Returns an array of Enfants objects
     */
    public function rechercher($value)
    {
        $valuedate = explode("/", $value);
        $date = '';
        if(!empty($valuedate[2]) && empty($valuedate[3])){
            $date = $valuedate[2]."-".$valuedate[1]."-".$valuedate[0];
        }
        return $this->createQueryBuilder('e')
            ->andWhere('e.rang LIKE :val')
            ->orWhere('e.nom LIKE :val')
            ->orWhere('e.prenom LIKE :val')
            ->orWhere('e.date_naissance = :valdate')
            ->orWhere('e.lieu_naissance LIKE :val')
            ->orWhere('e.qualite LIKE :val')
            ->orWhere('e.date_dece = :valdate')
            ->setParameter('val', '%'.$value.'%')
            ->setParameter('valdate', date_create($date))
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Enfants[] Returns an array of Enfants objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Enfants
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
