<?php


namespace App\Entity\Job;


use App\Entity\User\Compagnie;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OfferRepository;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Offer
 * @package App\Entity\User
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 * @ORM\Table()
 */
class Offer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="bigint")
     * @var int|null
     */
    private ?int  $id = null;


    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="App\Entity\Job\Skills",inversedBy="offers")
     * @ORM\JoinTable(name="skill_offer")
     */
    private ?Collection $skills;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="App\Entity\User\Jobseeker",inversedBy="offer")
     * @ORM\JoinTable(name="jobseeker_offer")
     */
    private ?Collection $jobSeekers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User\Compagnie",inversedBy="offers")
     */
    private Compagnie $compagnie;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="text")
     * @var string
     */
    private string $jobDescription;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private DateTime $createdAt;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime",nullable=true)
     */
    private DateTime $updatedAt;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job\Categories",inversedBy="offer")
     * @var Categories
     */
    private Categories $categories;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->createdAt = new DateTime();
        $this->jobSeekers = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @return Collection
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    /**
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return Compagnie
     */
    public function getCompagnie(): Compagnie
    {
        return $this->compagnie;
    }

    /**
     * @param Compagnie $compagnie
     */
    public function setCompagnie(Compagnie $compagnie): void
    {
        $this->compagnie = $compagnie;
    }

    /**
     * @param Categories $categories
     */
    public function setCategories(Categories $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return Categories
     */
    public function getCategories(): Categories
    {
        return $this->categories;
    }

}
