<?php


namespace App\Controller\User\Offer;


use App\Entity\Job\Offer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class OfferApplyController extends AbstractController
{

    /**
     * @Route("/offer/subscribe/{id<\d>}",name="app_offer_subscribe")
     * @param Offer $offer
     * @return JsonResponse
     */
    public function __invoke(Offer $offer):JsonResponse
    {
        if (!$offer){
            return $this->json([
                'isSuccess' => false
            ]);
        }
        $contain = $offer->getJobSeekers()->contains($this->getUser());
          $contain ?
            $offer->getJobSeekers()->removeElement($this->getUser()) :
            $offer->getJobSeekers()->add($this->getUser());

        $this->getDoctrine()->getManager()->flush();

       return $this->json([
            'isSuccess' => true,
            'contain' => $contain
        ]);

    }



}
