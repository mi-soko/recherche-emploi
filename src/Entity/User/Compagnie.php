<?php


namespace App\Entity\User;


use App\Repository\User\CompagnieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Compagnie
 * @package App\Entity\User
 * @ORM\Entity(repositoryClass=CompagnieRepository::class)
 */
class Compagnie extends User
{

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\Offer",mappedBy="compagnie")
     */
    private Collection $offers;

    public function getRoles():?array
    {
        return [$this->role];
    }

    public function __construct()
    {
        $this->offers = new ArrayCollection();
    }
}
