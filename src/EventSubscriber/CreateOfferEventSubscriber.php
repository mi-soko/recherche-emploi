<?php


namespace App\EventSubscriber;


use App\Entity\Job\Notification;
use App\Event\CreateOfferEvent;
use App\Entity\Job\Offer;
use App\Manager\NotificationManager;
use App\Repository\User\JobseekerRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CreateOfferEventSubscriber implements EventSubscriberInterface
{

    /**
     * @var JobseekerRepository
     */
    private JobseekerRepository $jobseekerRepository;
    /**
     * @var NotificationManager
     */
    private NotificationManager $notificationManager;

    public function __construct(JobseekerRepository $jobseekerRepository
        ,NotificationManager $notificationManager
    )
    {
        $this->jobseekerRepository = $jobseekerRepository;
        $this->notificationManager = $notificationManager;
    }

    public static function getSubscribedEvents():array
    {
        return [
            CreateOfferEvent::class => ['onCreateOffer',1]
  ];
    }

    public function onCreateOffer(CreateOfferEvent $event):void
    {
        /** @var array|null $jobSeekers */
        $jobSeekers = $this->jobseekerRepository->findBy(['category' => $event->getOffer()
            ->getCategories()
        ]);

        $offer = $event->getOffer();
        $this->notificationManager->create($jobSeekers,$offer);

    }
}
