<?php


namespace App\Controller\User\JobSeeker\Profile;


use App\Entity\User\Jobseeker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailCvController extends AbstractController
{

    /**
     * @Route("/profil/detail",name="profil_detail_cv")
     * @return Response
     */
    public function detailCv():Response
    {
        /** @var Jobseeker $user */
        $user = $this->getUser();

        return $this->render("jobSeeker/profile/cv/detailCv.html.twig",[
            "user"  => $this->getUser()
        ]);
    }

}
