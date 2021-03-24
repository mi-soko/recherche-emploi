<?php


namespace App\Entity\Job;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Skills
 * @package App\Entity\Job
 * @ORM\Entity()
 * @ORM\Table()
 */
class Skills
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="bigint")
     * @var int|null
     */
    private ?int  $id = null;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     * @var string
     */
    private string $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Job\Offer",mappedBy="skills")
     */
    private ?Collection  $offers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User\Jobseeker",inversedBy="skills")
     */
    private ?Collection  $jobSeeker;

    public function __construct()
    {
        $this->offers = new ArrayCollection();
        $this->jobSeeker = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|Collection|null
     */
    public function getJobSeeker():?Collection
    {
        return $this->jobSeeker;
    }

    /**
     * @return ArrayCollection|Collection|null
     */
    public function getOffers():?Collection
    {
        return $this->offers;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

}
