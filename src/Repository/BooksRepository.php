<?php

namespace App\Repository;

use App\Entity\Books;
use App\Classe\Search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Books|null find($id, $lockMode = null, $lockVersion = null)
 * @method Books|null findOneBy(array $criteria, array $orderBy = null)
 * @method Books[]    findAll()
 * @method Books[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BooksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Books::class);
    }

    public function findWithSearch (Search $search) {
        $query = $this
            ->createQueryBuilder('b')
            ->select('b','g', 'c')
            ->join('b.genre', 'g' )
            ->join('b.category', 'c');

        if (!empty($search->genres)) {
            $query = $query
            ->andWhere('g.id IN (:genres)')
            ->setParameter('genres', $search->genres);
        }

        if (!empty($search->categories)) {
            $query = $query
            ->andWhere('c.id IN (:categories)')
            ->setParameter('categories', $search->categories);
        }

        if (!empty($search->string)) {
            $query = $query
                ->andWhere('b.name LIKE :string')
                ->setParameter('string', "%{$search->string}%"); // recherche partielle   
        }

        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return Books[] Returns an array of Books objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Books
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
