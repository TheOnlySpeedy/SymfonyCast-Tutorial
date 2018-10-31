<?php

namespace App\Repository;

use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CommentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    public static function createNonDeleteCriteria(): Criteria {
        return Criteria::create()
            ->andWhere(Criteria::expr()->eq('isDeleted', false))
            ->orderBy(['createdAt' => 'DESC']);
    }

    /**
     * @param null|string $term
     */
    public function getWithSearchQueryBuilder(?string $term) : QueryBuilder {
        $qb = $this->createQueryBuilder('c')
            ->innerJoin('c.article', 'a')
            ->addSelect('a');

        if ($term) {
            $qb->andWhere('c.content LIKE :term OR c.authorName Like :term OR a.title LIKE :term')
                ->setParameter('term', '%' . $term . '%');
        }

        return $qb->orderBy('c.createdAt', 'DESC');
    }
}
