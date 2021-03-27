<?php


namespace App\Manager;


use App\Entity\Job\Offer;
use App\Entity\User\Compagnie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Security;

class OfferManager
{

    /**
     * @var EntityManagerInterface
     */
    private $manager;
    /**
     * @var Security
     */
    private $security;
    /**
     * @var RequestStack
     */
    private $stack;

    public function __construct(EntityManagerInterface $manager,Security $security,RequestStack $stack)
    {

        $this->manager = $manager;
        $this->security = $security;
        $this->stack = $stack;
    }

    public function create(Offer $offer):Offer
    {
        $faker = \Faker\Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);

        /** @var Compagnie $user */
        $user =  $this->security->getUser();
        $offer->setCompagnie($user);
        $offer->setPicture($faker->avatar);
        $offer->setExperienceLevels( (int) $this->stack->getCurrentRequest()
            ->request->get('offer_form')['experienceLevels']);
        $this->manager->persist($offer);
        $this->manager->flush();

        return $offer;
    }
}
