<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }

//    /**
//     * @return Article[] Returns an array of Article objects
//     */

    /**
     * @param $value
     * @return mixed
     */
    public function findAllPublishedOrderedByNewest()
    {
        return $this->addIsPublishedQueryBuilder()
            ->orderBy('a.publishedAt', 'DESC' )
            ->getQuery()
            ->getResult()
        ;
    }


    private function addIsPublishedQueryBuilder(QueryBuilder $queryBuilder = null){
        return $this->getOrCreateQueryBuilder($queryBuilder)->andWhere('a.publishedAt IS NOT NULL');
    }

    private function getOrCreateQueryBuilder(QueryBuilder $queryBuilder = null){
        //If a query object is not past, create a new one otherwise
        return $queryBuilder ?: $this->createQueryBuilder('a');
    }


    /*
    public function findOneBySomeField($value): ?Article
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
