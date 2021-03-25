<?php


namespace App\Entity\Job;


use App\Entity\User\Jobseeker;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Experience
 * @package App\Entity\Job
 * @ORM\Table()
 * @ORM\Entity()
 */
class Experience
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="bigint")
     * @var int|null
     */
    private ?int $id = null;

    /**
     * @Assert\NotBlank()
     * @var string|null
     * @ORM\Column(type="string")
     */
    private string $compagnieName;

    /**
     * @Assert\NotBlank()
     * @var string|null
     * @ORM\Column(type="string")
     */
    private string $posteOccupe;

    /**
     * @Assert\NotBlank()
     * @var string|null
     * @ORM\Column(type="string")
     */
    private string $dure;

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private ?string $description = null;


    /**
     * @var Jobseeker|null
     * @ORM\ManyToOne(inversedBy="experience",targetEntity="App\Entity\User\Jobseeker")
     */
    private Jobseeker $jobSeeker;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getDure(): ?string
    {
        return $this->dure;
    }

    /**
     * @param string|null $dure
     */
    public function setDure(?string $dure): void
    {
        $this->dure = $dure;
    }

    /**
     * @return Jobseeker|null
     */
    public function getJobSeeker(): ?Jobseeker
    {
        return $this->jobSeeker;
    }

    /**
     * @param Jobseeker|null $jobSeeker
     */
    public function setJobSeeker(?Jobseeker $jobSeeker): void
    {
        $this->jobSeeker = $jobSeeker;
    }

    /**
     * @param string $compagnieName
     */
    public function setCompagnieName(string $compagnieName): void
    {
        $this->compagnieName = $compagnieName;
    }

    /**
     * @param string $posteOccupe
     */
    public function setPosteOccupe(string $posteOccupe): void
    {
        $this->posteOccupe = $posteOccupe;
    }

    /**
     * @return string
     */
    public function getCompagnieName(): string
    {
        return $this->compagnieName;
    }

    /**
     * @return string
     */
    public function getPosteOccupe(): string
    {
        return $this->posteOccupe;
    }



}
