<?php

namespace App\DataFixtures;

use App\Entity\Job\Categories;
use App\Entity\Job\Experience;
use App\Entity\Job\Offer;
use App\Entity\Job\Skills;
use App\Entity\User\Compagnie;
use App\Entity\User\Jobseeker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }



    public function load(ObjectManager $manager)
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


        $dataPosteOccupe =  [
            "Developpeur Junior",
            "Directeur",
            "Manager",
            "Tech Lead",
            "Developpeur Senior",
        ];

        $programmation_language =  [
            "PHP",
            "RUBY",
            "JAVA",
            "REDIS",
            "REACTJS",
            "REACT NATIVE",
            "ANGULAR",
            "C",
            "C++",
            "C#",
            "F#",
            ".NET",
            "VBA",
            "SQL SERVER",
            "MYSQL",
            "POSTGRES",
            "GO",
            "TYPESCRIPT",
            "PYTHON",
            "VUS JS",
            "LARAVEL",
            "SYMFONY",
            "CAKE PHP",
            "SPRING BOOT",
            "J2E",
            "DJANGO",

        ];

        $programmation_language_arrayLength = count($programmation_language);


        $categoriesData = [
            'Bachelor Informatique et Réseaux',
            "Diplôme école d'ingénieur informatique",
            "Développeur multimédia",
            "Programmeur",
        ];


        for ($i = 1 ; $i <= 4; $i++)
        {
            $categories = new Categories();
            $categories->setName($categoriesData[$i - 1]);
            $manager->persist($categories);
            $this->addReference('categories-'.$i,$categories);
        }

        for ($i = 1 ; $i <= $programmation_language_arrayLength ; $i++)
        {
            $skills = new Skills();
            $skills->setName($programmation_language[$i - 1]);
            $manager->persist($skills);
            $this->addReference('skill-'.$i,$skills);
        }

        $jobSeeker = new Jobseeker();
        $jobSeeker->setPicture($faker->avatar);
        $jobSeeker->setPhoneNumber($faker->phoneNumber);
        $jobSeeker->setExperienceLevels(3);
        $jobSeeker->setPassword($this->encoder->encodePassword($jobSeeker,"sokosoko"));
        $jobSeeker->setAddress($faker->address);
        $jobSeeker->setFullName("Mamadou ibrahima Soko");
        $jobSeeker->setProfileTitle($dataTech[0]);
        $jobSeeker->setRole($jobSeeker->getRole());
        $jobSeeker->setCategory($this->getReference('categories-'.mt_rand(1,4)));
        for ($i = 0 ; $i <= 3 ; $i++)
        {
            $experience = new Experience();
            $experience->setCompagnieName($faker->company);
            $experience->setDescription($this->getJobDescriptions());
            $experience->setDure($this->getDate());
            $experience->setPosteOccupe($dataPosteOccupe[mt_rand(0,4)]);
            $experience->setJobSeeker($jobSeeker);
            $manager->persist($experience);
        }

        $jobSeeker->setEmail("soko@gmail.com");


        for ($i = 1 ; $i <= 10 ; $i++){
            $skills = $this->getReference('skill-'.mt_rand(1,$programmation_language_arrayLength));
            if(! $jobSeeker->getSkills()->contains($skills) )
            {
                $jobSeeker->getSkills()->add($skills);
            }
        }
        $manager->persist($jobSeeker);
        $this->addReference("user-0",$jobSeeker);

        for ($i = 1 ; $i <= 30 ; $i++)
        {
            $jobSeeker = new Jobseeker();
            $jobSeeker->setPicture($faker->avatar);
            $jobSeeker->setPhoneNumber($faker->phoneNumber);
            $jobSeeker->setExperienceLevels(mt_rand(1,3));
            $jobSeeker->setPassword($this->encoder->encodePassword($jobSeeker,"sokosoko"));
            $jobSeeker->setAddress($faker->address);
            $jobSeeker->setFullName($faker->firstName ." ".$faker->lastName);
            $jobSeeker->setProfileTitle($dataTech[mt_rand(0,4)]);
            $jobSeeker->setRole($jobSeeker->getRole());
            $jobSeeker->setEmail($faker->email);
            $jobSeeker->setCategory($this->getReference('categories-'.mt_rand(1,4)));
            for ($j = 1 ; $j <= mt_rand(5,14) ; $j++){
                $skills = $this->getReference('skill-'.mt_rand(1,$programmation_language_arrayLength));
                $jobSeeker->getSkills()->contains($skills) ?:$jobSeeker->getSkills()->add($skills);
            }

            for ($j = 0 ; $j < mt_rand(1,4) ; $j++)
            {
                $experience = new Experience();
                $experience->setCompagnieName($faker->company);
                $experience->setDescription($this->getJobDescriptions());
                $experience->setDure($this->getDate());
                $experience->setPosteOccupe($dataPosteOccupe[mt_rand(0,4)]);
                $experience->setJobSeeker($jobSeeker);
                $manager->persist($experience);
            }

            $manager->persist($jobSeeker);
            $this->addReference("user-".$i,$jobSeeker);
        }





        for ($i = 1 ; $i <= 10; $i++)
        {
            $compagnie = new Compagnie();
            $compagnie->setEmail($faker->companyEmail);
            $compagnie->setRole($compagnie->getRole());
            $compagnie->setFullName($faker->name);
            $compagnie->setPhoneNumber($faker->phoneNumber);
            $compagnie->setPicture($faker->imageUrl(250,250));
            $compagnie->setPassword($this->encoder->encodePassword($jobSeeker,"sokosoko"));
            $compagnie->setCompagnieName($faker->company);
            $manager->persist($compagnie);
            $this->addReference('compagnie-'.$i,$compagnie);
        }

        for ($i = 1 ; $i <= 30; $i++)
        {
            /** @var Compagnie $compagnie */
            $compagnie = $this->getReference('compagnie-'.mt_rand(1,10));
            $offer = new Offer();
            $offer->setExperienceLevels(mt_rand(1,3));
            $offer->setCompagnie($compagnie);
            $offer->setJobDescription($this->getJobDescriptions());
            $offer->setTitle($dataPosteOccupe[mt_rand(0,4)]);
            for ($j = 1 ; $j <= $programmation_language_arrayLength ; $j++)
            {
                $skills = $this->getReference('skill-'.mt_rand(1,$programmation_language_arrayLength));
                if(!$offer->getSkills()->contains($skills))
                {
                    $offer->getSkills()->add($skills);
                }
            }

            $offer->setCategories($this->getReference('categories-'.mt_rand(1,4)));
            $manager->persist($offer);

        }


        $manager->flush();
    }



    private function getJobDescriptions():string
    {

        return <<<TEXT
        <p><strong>Intranet HUB: React JS - Connexion via Office 365 - Chart.JS - Bootstrap - Material - UI - Particles -<br />
<br />
La gestion du p&ocirc;le innovation d&#39;Epitech Bordeaux a pour but&nbsp;d&rsquo;accompagner les &eacute;tudiants dans l&rsquo;id&eacute;ation et la r&eacute;alisation de projets innovants.<br />
Avec les autres membres de l&rsquo;&eacute;quipe du HUB, nous organisons des activit&eacute;s, des conf&eacute;rences en partenariats avec des startups et des entreprises externes.<br />
Nous donnons aussi aux &eacute;tudiants, l&rsquo;opportunit&eacute; unique de r&eacute;aliser eux-m&ecirc;mes des conf&eacute;rences et ateliers afin qu&#39;ils puissent partager leurs connaissances.<br />
Nous avons avec un autre membre de l&#39;&eacute;quipe cr&eacute;er un intranet qui nous permet d&#39;automatiser des taches r&eacute;barbatives. Il a &eacute;t&eacute; approuv&eacute; par l&#39;&eacute;cole et mis en ligne pour &ecirc;tre utilis&eacute; par tous les &eacute;tudiants de l&#39;&eacute;cole.</strong></p>
        
TEXT;

    }

    private function getDate():string
    {
        $dateFin =  $dateFin =  (new \DateTime(
            sprintf("%d-%d-%d",mt_rand(2015,2021),mt_rand(1,5),mt_rand(1,27))))
            ->format("F-Y");
        $dateDebut =  (new \DateTime(
            sprintf("%d-%d-%d",mt_rand(2005,2015),mt_rand(1,12),mt_rand(1,27))))
            ->format("F-Y");

        return "".$dateDebut ." à ". $dateFin;
    }

}


