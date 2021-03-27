<?php


declare(strict_types=1);

namespace App\Event;


use App\Entity\Job\Offer;

class CreateOfferEvent
{

    /**
     * @var Offer
     */
    private $offer;

    public function __construct(Offer $offer)
    {
        $this->offer = $offer;
    }

    /**
     * @return Offer
     */
    public function getOffer(): Offer
    {
        return $this->offer;
    }

}
