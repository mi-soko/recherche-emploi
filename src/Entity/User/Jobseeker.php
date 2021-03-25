<?php

declare(strict_types=1);

namespace App\Entity\User;


use App\Entity\Job\Categories;
use App\Repository\User\JobseekerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\ManyToMany(targetEntity="App\Entity\Job\Skills",inversedBy="jobSeeker",cascade={"persist"},fetch="LAZY")
     * @ORM\JoinTable("skills_jobseeker")
     */
    private Collection $skills;

    /**
     * @ORM\ManyToOne(inversedBy="jobSeeker",targetEntity="App\Entity\Job\Categories",fetch="EAGER")
     */
    private ?Categories $category = null;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\Experience",mappedBy="jobSeeker")
     */
    private Collection $experience;


    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private ?string $profileTitle = null;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private ?string $address = null;

    /**
     * @ORM\Column(type="smallint")
     */
    private ?int $experienceLevels = null;

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

    /**
     * @param ArrayCollection|Collection $skills
     */
    public function setSkills($skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @param Categories $category
     */
    public function setCategory(Categories $category): void
    {
        $this->category = $category;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }


    /**
     * @return string
     */
    public function getProfileTitle(): ?string
    {
        return $this->profileTitle;
    }
    /**
     * @param string $profileTitle
     */
    public function setProfileTitle(string $profileTitle): void
    {
        $this->profileTitle = $profileTitle;
    }


    /**
     * @return string
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }


    /**
     * @return ArrayCollection|Collection
     */
    public function getSkills():?Collection
    {
        return $this->skills;
    }


    /**
     * @return ArrayCollection|Collection
     */
    public function getExperience():?Collection
    {
        return $this->experience;
    }

    /**
     * @param ArrayCollection|Collection $experience
     */
    public function setExperience($experience): void
    {
        $this->experience = $experience;
    }

    /**
     * @param int $experienceLevels
     */
    public function setExperienceLevels(int $experienceLevels): void
    {
        $this->experienceLevels = $experienceLevels;
    }

    /**
     * @return int
     */
    public function getExperienceLevels(): ?int
    {
        return $this->experienceLevels;
    }

}
