<?php


namespace App\Entity\Job;


use App\Entity\User\Compagnie;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OfferRepository;
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
    private Collection $offer;

    /**
     * @ORM\OneToMany(mappedBy="category",targetEntity="App\Entity\User\Jobseeker")
     * @var Collection|null
     */
    private Collection $jobSeeker;

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

}
