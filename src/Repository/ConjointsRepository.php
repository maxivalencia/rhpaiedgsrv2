<?php

namespace App\Repository;

use App\Entity\Conjoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Conjoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conjoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conjoints[]    findAll()
 * @method Conjoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConjointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conjoints::class);
    }

    /**
     * @return Conjoints[] Returns an array of Conjoints objects
     */
    public function rechercher($value)
    {
        $valuedate = explode("/", $value);
        $date = '';
        if(!empty($valuedate[2]) && empty($valuedate[3])){
            $date = $valuedate[2]."-".$valuedate[1]."-".$valuedate[0];
        }
        return $this->createQueryBuilder('c')
            ->andWhere('c.rang LIKE :val')
            ->orWhere('c.nom LIKE :val')
            ->orWhere('c.prenom LIKE :val')
            ->orWhere('c.date_naissance = :valdate')
            ->orWhere('c.lieu_naissance LIKE :val')
            ->orWhere('c.nom_pere LIKE :val')
            ->orWhere('c.nom_mere LIKE :val')
            ->orWhere('c.date_mariage = :valdate')
            ->orWhere('c.numero_cin LIKE :val')
            ->orWhere('c.date_cin = :valdate')
            ->orWhere('c.lieu_cin LIKE :val')
            ->orWhere('c.reference_autorisation_mariage LIKE :val')
            ->orWhere('c.date_reference_autorisation_mariage = :valdate')
            ->orWhere('c.lieu_mariage LIKE :val')
            ->orWhere('c.reference_officiel_mariage LIKE :val')
            ->orWhere('c.date_reference_officiel_mariage = :valdate')
            ->setParameter('val', '%'.$value.'%')
            ->setParameter('valdate', date_create($date))
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Conjoints[] Returns an array of Conjoints objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Conjoints
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
