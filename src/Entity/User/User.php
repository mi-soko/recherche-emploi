<?php

declare(strict_types=1);

namespace App\Entity\User;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class User
 * @package App\Entity
 * @ORM\Entity()
 * @UniqueEntity(fields={"email","phoneNumber"})
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
        "JobSeeker"=Jobseeker::class,
        "Companie"=Compagnie::class,
 * })
 */
abstract class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="bigint")
     * @var int|null
     */
    protected ?int $id = null;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string",length=70)
     */
    protected ?string $fullName = null;

    /**
     * @Assert\NotBlank()
     * @Assert\Positive()
     * @Assert\Regex(pattern="/^0\d{9}$/", message="N° de téléphone invalide.")
     * @ORM\Column(type="string",length=20)
     */
    protected ?string $phoneNumber = null;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @ORM\Column(type="string")
     */
    protected ?string $email = null;

    /**
     * @ORM\Column(type="string")
     */
    protected ?string $password = null;

    /**
     * @ORM\Column(type="string")
     */
    protected ?string $picture = null;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min="8",maxMessage="4096",min="Le mot de passe est trop court",maxMessage="Le mot de passe est trop long")
     */
    protected ?string $plainPassword = null;

    protected string $role;

    public function getPassword():?string
    {
       return $this->password;
    }

    public function getSalt():void
    {}

    public function getUsername():?string
    {
       return $this->email;
    }

    public function eraseCredentials():void
    {
       $this->plainPassword = null;
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
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string|null $fullName
     */
    public function setFullName(?string $fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $phoneNumber
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string|null $plainPassword
     */
    public function setPlainPassword(?string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }




}
