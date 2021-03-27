<?php


namespace App\Manager;


use App\Entity\Job\Notification;
use App\Entity\Job\Offer;
use Doctrine\ORM\EntityManagerInterface;

class NotificationManager
{

    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function create(array $jobSeekers,Offer $offer):void
    {

        foreach ($jobSeekers as $jobseeker)
        {
            $notification = new Notification();
            $notification->getJobSeeker()->add($jobseeker);
            $notification->setOffer($offer);
            $this->manager->persist($notification);
        }

        $this->manager->flush();
    }

}
