<?php

declare(strict_types=1);

namespace App\Entity\User;


use App\Entity\Job\Categories;
use App\Repository\User\JobseekerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Jobseeker
 * @package App\Entity\User
 * @ORM\Entity(repositoryClass=JobseekerRepository::class)
 */
class Jobseeker extends User
{

    /**
     * @var ArrayCollection|Collection
     * @ORM\ManyToMany(targetEntity="App\Entity\Job\Offer",mappedBy="jobSeekers")
     */
    private Collection $offer;

    /**
     * @var ArrayCollection|Collection
     * @ORM\ManyToMany(targetEntity="App\Entity\Job\Skills",mappedBy="jobSeeker")
     */
    private Collection $skills;

    /**
     * @ORM\ManyToOne(inversedBy="jobSeeker",targetEntity="App\Entity\Job\Categories")
     */
    private Categories $category;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\Experience",mappedBy="jobSeeker")
     */
    private Collection $experience;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->offer = new ArrayCollection();
        $this->experience = new ArrayCollection();
    }

    public function getRoles():?array
    {
        return ["ROLE_JOB_SEEKER"];
    }

    /**
     * @return Categories
     */
    public function getCategory(): Categories
    {
        return $this->category;
    }

    public function getRole(): string
    {
        return "ROLE_JOB_SEEKER";
    }
}
