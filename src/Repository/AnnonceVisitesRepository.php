<?php

namespace App\Repository;

use App\Entity\AnnonceVisites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnnonceVisites|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnnonceVisites|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnnonceVisites[]    findAll()
 * @method AnnonceVisites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceVisitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnnonceVisites::class);
    }

    // /**
    //  * @return AnnonceVisites[] Returns an array of AnnonceVisites objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnnonceVisites
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
