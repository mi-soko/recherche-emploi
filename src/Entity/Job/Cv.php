<?php


namespace App\Entity\Job;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

class Cv
{
    /**
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @var Categories
     */
    private Categories $categories;

    /**
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @var ArrayCollection|Collection
     */
    private Collection $skills;
    /**
     *  @Assert\NotNull()
     * @Assert\NotBlank()
     * @var ArrayCollection|Collection
     */
    private Collection $experience;

    /**
     *  @Assert\NotNull()
     * @Assert\NotBlank()
     * @var string
     */
    private string $profileTitle;

    /**
     * @Assert\NotNull()
     * @Assert\NotBlank()
     * @var string
     */
    private string $address;

    /**
     * @var string
     */
    private string $experienceLevels;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->experience = new ArrayCollection();
    }

    /**
     * @return Categories
     */
    public function getCategories(): Categories
    {
        return $this->categories;
    }

    /**
     * @param Categories $categories
     */
    public function setCategories(Categories $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param ArrayCollection|Collection $skills
     */
    public function setSkills($skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param ArrayCollection|Collection $experience
     */
    public function setExperience($experience): void
    {
        $this->experience = $experience;
    }

    /**
     * @return string
     */
    public function getProfileTitle(): string
    {
        return $this->profileTitle;
    }

    /**
     * @param string $profileTitle
     */
    public function setProfileTitle(string $profileTitle): void
    {
        $this->profileTitle = $profileTitle;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getExperienceLevels(): string
    {
        return $this->experienceLevels;
    }

    /**
     * @param string $experienceLevels
     */
    public function setExperienceLevels(string $experienceLevels): void
    {
        $this->experienceLevels = $experienceLevels;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }



}
