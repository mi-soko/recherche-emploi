<?php


namespace App\Controller\Offer;


use App\Entity\Job\Offer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class OfferApplyController extends AbstractController
{

    /**
     * @Route("/offer/subscribe/{id}",name="app_offer_subscribe")
     * @param Offer $offer
     * @return RedirectResponse|NotFoundHttpException
     */
    public function __invoke(Offer $offer):Response
    {
        if (!$offer){
            return $this->createNotFoundException("Objet non trouve");
        }
        $contain = $offer->getJobSeekers()->contains($this->getUser());
          $contain ?
            $offer->getJobSeekers()->removeElement($this->getUser()) :
            $offer->getJobSeekers()->add($this->getUser());

        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute("app_offer_show",[
            'id' => $offer->getId()
        ]);

    }



}
