<?php


namespace App\Entity\Job;


use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table()
 * @ORM\Entity()
 * Class Notification
 * @package App\Entity\Job
 */
class Notification
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="bigint")
     * @var int|null
     */
    private ?int $id = null;
    /**
     * @ORM\Column(type="datetime")
     * @var DateTime|null
     */
    private DateTime $createAt;
    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private bool $isRead;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User\Jobseeker",inversedBy="notifications",fetch="EAGER")
     * @ORM\JoinTable(name="jobSeeker_notification")
     * @var Collection
     */

    private Collection $jobSeeker;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job\Offer",inversedBy="notification",fetch="EAGER")
     * @var Offer
     */
    private Offer $offer;

    public function __construct()
    {
        $this->jobSeeker = new ArrayCollection();
        $this->createAt = new DateTime();
        $this->isRead = false;
    }

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
     * @return DateTime|null
     */
    public function getCreateAt(): ?DateTime
    {
        return $this->createAt;
    }

    /**
     * @param DateTime|null $createAt
     */
    public function setCreateAt(?DateTime $createAt): void
    {
        $this->createAt = $createAt;
    }

    /**
     * @return bool
     */
    public function isRead(): bool
    {
        return $this->isRead;
    }

    /**
     * @param bool $isRead
     */
    public function setIsRead(bool $isRead): void
    {
        $this->isRead = $isRead;
    }

    /**
     * @return Collection
     */
    public function getJobSeeker(): Collection
    {
        return $this->jobSeeker;
    }

    /**
     * @param Collection $jobSeeker
     */
    public function setJobSeeker(Collection $jobSeeker): void
    {
        $this->jobSeeker = $jobSeeker;
    }

    /**
     * @return Offer
     */
    public function getOffer(): Offer
    {
        return $this->offer;
    }

    /**
     * @param Offer $offer
     */
    public function setOffer(Offer $offer): void
    {
        $this->offer = $offer;
    }

}
