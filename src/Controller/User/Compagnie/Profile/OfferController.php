<?php


declare(strict_types=1);

namespace App\Controller\User\Compagnie\Profile;

use App\Entity\Job\Offer;
use App\Entity\User\Compagnie;
use App\Event\CreateOfferEvent;
use App\Form\User\Compagnie\OfferFormType;
use App\Manager\OfferManager;
use App\Repository\OfferRepository;
use Psr\EventDispatcher\EventDispatcherInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfferController extends AbstractController
{


    /**
     * @Route("/offer",name="app_offer_list")
     * @param OfferRepository $repository
     * @return Response
     */
    public function index(OfferRepository $repository):Response
    {
        return $this->render("offer/index.html.twig",[
            'offers' => $repository->findAll()
        ]);
    }

    /**
     * @Route("profile/compagnie/offer/create",name="app_compagnie_offer_create")
     * * @IsGranted("ROLE_COMPAGNIE")
     * @param Request $request
     * @param EventDispatcherInterface $dispatcher
     * @param OfferManager $offerManager
     * @return Response
     */
    public function create(Request $request,EventDispatcherInterface $dispatcher,OfferManager $offerManager):Response
    {
        $form =  $this->createForm(OfferFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $offer = $offerManager->create($form->getData());

            /** Dispatcher l'evenement pour notifier les job seekers */
            $dispatcher->dispatch(new CreateOfferEvent($offer));

            return $this->redirectToRoute('app_compagnie_index');
        }

        return $this->render("compagnie/profile/createOffer.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("profile/compagnie/offer/{id}/update",name="app_compagnie_offer_update")
     * * @IsGranted("ROLE_COMPAGNIE")
     * @param Offer $offer
     * @param Request $request
     * @return Response
     */
    public function update(Offer $offer,Request $request):Response
    {
        if(!$offer) return $this->createNotFoundException("objet non trouve");

        $form =  $this->createForm(OfferFormType::class,$offer);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            /** @var Offer $offer */
            $offer = $form->getData();

            $offer->setExperienceLevels( (int) $request->request->get('offer_form')['experienceLevels']);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_compagnie_index');
        }

        return $this->render("compagnie/profile/createOffer.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("profile/compagnie/offer/{id}/delete",name="app_compagnie_offer_delete")
     * * @IsGranted("ROLE_COMPAGNIE")
     * @param Offer $offer
     * @param Request $request
     * @return Response
     */
    public function delete(Offer $offer, Request $request):Response
    {
        if(!$offer){
            return $this->createNotFoundException("objet non trouve");
        }

        $this->getDoctrine()->getManager()->remove($offer);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_compagnie_index');
    }

    /**
     * @Route("/offer/{id}",name="app_offer_show")
     * @param Offer $offer
     * @return Response
     */
    public function show(Offer $offer):Response
    {
        if(!$offer){
            return $this->createNotFoundException("objet non trouve");
        }
        return $this->render("offer/show.html.twig",[
            'offer' => $offer
        ]);
    }


}
