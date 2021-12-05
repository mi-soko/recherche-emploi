<?php


declare(strict_types=1);

namespace App\Manager;

use App\Entity\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserAuthManager
{

    private EntityManagerInterface $manager;

    private UserPasswordEncoderInterface $encoder;

    public function __construct(EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder )
    {
        $this->manager = $manager;
        $this->encoder = $encoder;
    }

    /**
     * @param User $user
     */
    public function save(User $user):void
    {

        $password = $this->encoder->encodePassword($user,$user->plainPassword);
        $user->setRole($user->getRole());
        $user->setPassword($password);
        $this->manager->persist($user);
        $this->manager->flush();
    }

}
