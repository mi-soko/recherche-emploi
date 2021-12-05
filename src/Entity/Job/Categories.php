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
class Categories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="bigint")
     * @var int|null
     */
    private ?int  $id = null;

    /**
     * @ORM\OneToMany(mappedBy="categories",targetEntity="App\Entity\Job\Offer")
     * @var Collection|null
     */
    private ?Collection $offer = null;

    /**
     * @ORM\OneToMany(mappedBy="category",targetEntity="App\Entity\User\Jobseeker",cascade={"persist"})
     * @var Collection|null
     */
    private ?Collection $jobSeeker = null;


    /**
     * @Assert\NotBlank()
     * @var string
     * @ORM\Column(type="text")
     */
    private string $name;


    public function __construct()
    {
        $this->jobSeeker = new ArrayCollection();
        $this->offer = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return Collection|null
     */
    public function getOffer(): ?Collection
    {
        return $this->offer;
    }

    /**
     * @return Collection|null
     */
    public function getJobSeeker(): ?Collection
    {
        return $this->jobSeeker;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Collection|null $jobSeeker
     */
    public function setJobSeeker(?Collection $jobSeeker): void
    {
        $this->jobSeeker = $jobSeeker;
    }


    /**
     * @param Collection|null $offer
     */
    public function setOffer(?Collection $offer): void
    {
        $this->offer = $offer;
    }
}
