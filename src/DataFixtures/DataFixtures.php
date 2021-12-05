<?php


namespace App\DataFixtures;


use App\Entity\User\Jobseeker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;

class DataFixtures
{

    private UserPasswordEncoder $encoder;

    public function __construct(UserPasswordEncoder $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager):void
    {



        $faker = \Faker\Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);

        $dataTech =  [
          "Developpeur PHP et Android",
          "Developpeur Ruby et Mobile",
          "Developpeur Java et Angular",
          "Formateur en Java et PHP",
          "Developpeur Senior",
        ];

        $jobSeeker = new Jobseeker();
        $jobSeeker->setPicture($faker->avatar);
        $jobSeeker->setPhoneNumber($faker->phoneNumber);
        $jobSeeker->setExperienceLevels(mt_rand(0,4));
        $jobSeeker->setPassword($this->encoder->encodePassword($jobSeeker,"sokosoko"));
        $jobSeeker->setAddress($faker->address);
        $jobSeeker->setFullName($faker->name);
        $jobSeeker->setProfileTitle(array_rand($dataTech));
        $jobSeeker->setRole($jobSeeker->getRole());

        $manager->persist($jobSeeker);
        $manager->flush();
    }

}


