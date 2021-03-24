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
}
