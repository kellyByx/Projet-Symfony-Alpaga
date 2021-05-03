<?php

namespace App\Repository;

use App\Entity\ArticleInfos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleInfos|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleInfos|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleInfos[]    findAll()
 * @method ArticleInfos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleInfosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleInfos::class);
    }

    // /**
    //  * @return ArticleInfos[] Returns an array of ArticleInfos objects
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
    public function findOneBySomeField($value): ?ArticleInfos
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
