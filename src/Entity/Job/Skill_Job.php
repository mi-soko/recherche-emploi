<?php


namespace App\Entity\Job;


use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Skill_Job
 * @package App\Entity\Job
 * @ORM\Entity()
 * @ORM\Table(name="skill_job")
 * @UniqueEntity({"jobs", "skills"})
 */
class Skill_Job
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id= null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job\Offer", inversedBy="jobSeekers")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="id", nullable=false)
     */
    private ?Offer $offer = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job\Skills", inversedBy="offers")
     * @ORM\JoinColumn(name="skills_id", referencedColumnName="id", nullable=false)
     */
    private ?Skills $skills = null;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private DateTime $postedAt ;

    public function __construct()
    {
        $this->postedAt = new DateTime();
    }

    /**
     * @return Skills|null
     */
    public function getSkills(): ?Skills
    {
        return $this->skills;
    }

    /**
     * @return Offer|null
     */
    public function getOffer(): ?Offer
    {
        return $this->offer;
    }

    /**
     * @return DateTime
     */
    public function getPostedAt(): DateTime
    {
        return $this->postedAt;
    }

}
