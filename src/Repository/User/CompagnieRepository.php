<?php


namespace App\Repository\User;


use App\Entity\User\Compagnie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CompagnieRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
    parent::__construct($registry, Compagnie::class);
}
}
