<?php

namespace App\Repository;

use App\Entity\NotesPOS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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

    /**
     * @return NotesPOS[] Returns an array of NotesPOS objects
     */
    public function rechercher($value)
    {
        $valuedate = explode("/", $value);
        $date = '';
        if(!empty($valuedate[2]) && empty($valuedate[3])){
            $date = $valuedate[2]."-".$valuedate[1]."-".$valuedate[0];
        } 
        return $this->createQueryBuilder('n')
            ->andWhere('n.annee = :valdate')
            ->orWhere('n.qf LIKE :val')
            ->orWhere('n.vet LIKE :val')
            ->orWhere('n.ags LIKE :val')
            ->orWhere('n.niveau LIKE :val')
            ->orWhere('n.potentiel LIKE :val')
            ->orWhere('n.appreciation_complet LIKE :val')
            ->setParameter('val', '%'.$value.'%')
            ->setParameter('valdate', date_create($date))
            ->orderBy('n.annee', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
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
