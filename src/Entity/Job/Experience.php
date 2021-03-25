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
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private ?string $description = null;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     * @Assert\NotNull()
     * @Assert\Date()
     */
    private DateTime $startedAt;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     * @Assert\NotNull()
     * @Assert\Date()
     */
    private DateTime $finishedAt;

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
     * @return DateTime
     */
    public function getStartedAt(): DateTime
    {
        return $this->startedAt;
    }

    /**
     * @param DateTime $startedAt
     */
    public function setStartedAt(DateTime $startedAt): void
    {
        $this->startedAt = $startedAt;
    }

    /**
     * @return DateTime
     */
    public function getFinishedAt(): DateTime
    {
        return $this->finishedAt;
    }

    /**
     * @param DateTime $finishedAt
     */
    public function setFinishedAt(DateTime $finishedAt): void
    {
        $this->finishedAt = $finishedAt;
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



}
