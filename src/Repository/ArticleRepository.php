<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findAll($maxResult = 12)
    {
        return $this
            ->createQueryBuilder('a')
            ->select('partial a.{id, title, subtitle, tags, creationDate, image, slug}')
            ->setMaxResults($maxResult)
            ->addOrderBy('a.creationDate', 'DESC')
            ->getQuery()
            ->getArrayResult()
            ;
    }

    public function withTag($tag, $maxResult = 12)
    {
        return $this
            ->createQueryBuilder('a')
            ->select('partial a.{id, title, subtitle, tags, creationDate, image, slug}')
            ->where('a.tags LIKE :tag')
            ->setParameter('tag', '\'"%' . $tag . '%"\'')
            ->setMaxResults($maxResult)
            ->addOrderBy('a.creationDate', 'DESC')
            ->getQuery()
            ->getArrayResult()
        ;
    }
}
