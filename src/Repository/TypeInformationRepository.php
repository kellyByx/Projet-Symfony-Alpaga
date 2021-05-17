<?php

namespace App\Repository;

use App\Entity\TypeInformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeInformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeInformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeInformation[]    findAll()
 * @method TypeInformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeInformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeInformation::class);
    }

    // /**
    //  * @return TypeInformation[] Returns an array of TypeInformation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeInformation
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
