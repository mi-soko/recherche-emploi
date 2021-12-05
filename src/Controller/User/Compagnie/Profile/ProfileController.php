<?php


namespace App\Controller\User\Compagnie\Profile;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{

    /**
     * @Route("profile/compagnie",name="app_compagnie_index")
     * @IsGranted("ROLE_COMPAGNIE",message="vous n'avez pas le droit")
     * @return Response
     */
    public function index():Response
    {
       return $this->render("compagnie/profile/profile.html.twig",[
           'user' => $this->getUser()
       ]);
    }


}
