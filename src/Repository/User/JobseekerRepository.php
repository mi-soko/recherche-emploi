<?php

declare(strict_types=1);

namespace App\Repository\User;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use \App\Entity\User\Jobseeker;

/**
 * Class JobseekerRepository
 * @package App\Repository\User
 */
class JobseekerRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jobseeker::class);
    }



    public function findAllCategoriesByNotNull()
    {
      return  $this->createQueryBuilder("j")
            ->select('j')
            ->where('j.category IS NOT NULL')
            ->getQuery()->getResult()
        ;


    }



}
