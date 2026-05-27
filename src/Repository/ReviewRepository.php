<?php

namespace App\Repository;

use App\Entity\Review;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Review>
 */
class ReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Review::class);
    }

    /**
     * @return Review[]
     */
    public function findByDestination(string $destinationId): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.destinationId = :destinationId')
            ->setParameter('destinationId', $destinationId)
            ->orderBy('r.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function getAverageRating(string $destinationId): ?float
    {
        $result = $this->createQueryBuilder('r')
            ->select('AVG(r.rating) as avgRating', 'COUNT(r.id) as reviewCount')
            ->andWhere('r.destinationId = :destinationId')
            ->setParameter('destinationId', $destinationId)
            ->getQuery()
            ->getSingleResult();

        if (0 === (int) $result['reviewCount']) {
            return null;
        }

        return round((float) $result['avgRating'], 1);
    }

    public function countByDestination(string $destinationId): int
    {
        return (int) $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->andWhere('r.destinationId = :destinationId')
            ->setParameter('destinationId', $destinationId)
            ->getQuery()
            ->getSingleScalarResult();
    }
}