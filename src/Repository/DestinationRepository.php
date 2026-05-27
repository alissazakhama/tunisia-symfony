<?php

namespace App\Repository;

use App\Entity\Destination;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DestinationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Destination::class);
    }

    public function findBySlug(string $slug): ?Destination
    {
        return $this->findOneBy(['slug' => $slug]);
    }
}