<?php


namespace App\Entity\User;


use App\Repository\User\CompagnieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Compagnie
 * @package App\Entity\User
 * @ORM\Entity(repositoryClass=CompagnieRepository::class)
 */
class Compagnie extends User
{

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Job\Offer",mappedBy="compagnie")
     */
    private Collection $offers;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private string $compagnieName;

    public function getRoles(): ?array
    {
        return ['ROLE_COMPAGNIE'];
    }


    public function __construct()
    {
        $this->offers = new ArrayCollection();
    }

    public function getRole(): string
    {
        return 'ROLE_COMPAGNIE';
    }


    /**
     * @return string
     */
    public function getCompagnieName(): string
    {
        return $this->compagnieName;
    }

    /**
     * @param string $compagnieName
     */
    public function setCompagnieName(string $compagnieName): void
    {
        $this->compagnieName = $compagnieName;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * @param ArrayCollection|Collection $offers
     */
    public function setOffers($offers): void
    {
        $this->offers = $offers;
    }

}
