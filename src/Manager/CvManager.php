<?php

declare(strict_types=1);

namespace App\Manager;


use App\Entity\Job\Cv;
use App\Entity\Job\Skills;
use App\Entity\User\Jobseeker;
use App\Entity\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

/**
 * Class CvManager
 * @package App\Manager
 */
class CvManager
{

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;
    /**
     * @var Security
     */
    private Security $security;

    public function __construct(EntityManagerInterface $manager,Security $security)
    {
        $this->manager = $manager;
        $this->security = $security;
    }

    public function create(Cv $cv)
    {
        /** @var Jobseeker $user */
        $user = $this->manager->getRepository(User::class)->find($this->security->getUser()->getId());
        $user->setSkills($cv->getSkills());
        $user->setCategory($cv->getCategories());
        $user->setProfileTitle($cv->getProfileTitle());
        $user->setAddress($cv->getAddress());
        $user->setExperienceLevels((int)$cv->getExperienceLevels());
        $this->manager->flush();

    }

}
