<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\AnnonceVisites;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;



/**
 * @method AnnonceVisites|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnnonceVisites|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnnonceVisites[]    findAll()
 * @method AnnonceVisites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceVisitesRepository extends ServiceEntityRepository
{
    private $paginator;

    public function __construct(ManagerRegistry $registry, PaginatorInterface  $paginator)
    {
        parent::__construct($registry, AnnonceVisites::class);
        $this->paginator = $paginator;
    }

    /**
     * @return AnnonceVisites[] Returns an array of AnnonceVisites objects
     */

    public function obtenirResultatsFiltres(SearchData $data)
    {
        $reqQB = $this->createQueryBuilder('a')
            ->select('a.id',
                     'a.nomLieu',
                     'a.description',
                     'a.region',
                     'pays.nom', 
                     'ville.nom',
                     )
            ->join('a.pays','pays')
            ->join('a.ville','ville')
            ;

            if(!empty($data->pays)){
                $reqQB = $reqQB->andWhere('a.pays = :pays')
                ->setParameter('pays', $data->pays);       
            }
    
            if(!empty($data->ville)){
                $reqQB = $reqQB->andWhere('a.ville = :ville')
                ->setParameter('ville', $data->ville);       
            }
        ;

        $resultat =  $reqQB->getQuery();
        return $this->paginator->paginate(
            $resultat,
            $data->numeroPage, // objet $data dans le controller, propriété publique dans la classe
            50//nbr d'articles vont s'affiche par page
        );

    }

                //av
            //  ->andWhere('a.exampleField = :val')
            //  ->setParameter('val', $value)
            //  ->orderBy('a.id', 'ASC')
            //  ->setMaxResults(10)
            //  ->getQuery()
            //  ->getResult()
    
    // /**
    //  * @return Property[] Returns an array of Property objects
    //  */
    /*

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
