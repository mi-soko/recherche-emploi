<?php


namespace App\Controller\User\JobSeeker\Profile;


use App\Entity\User\Jobseeker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CvController extends AbstractController
{

    /**
     * @Route("/profile/cv/detail",name="profil_detail_cv")
     * @return Response
     */
    public function detailCv():Response
    {
        return $this->render("jobSeeker/profile/cv/detailCv.html.twig",[
            "user"  => $this->getUser()
        ]);
    }

    /**
     * @Route("/profile/cv/{id}",name="app_show_cv")
     * @param Jobseeker $jobseeker
     * @return Response
     */
    public function show(Jobseeker $jobseeker):Response
    {
        if(!$this->getUser()) return $this->redirectToRoute('app_login');

        if (!$jobseeker){
            $this->createNotFoundException("Objet non trouvé");
        }

        if ($this->getUser()->getId() === $jobseeker->getId()){
            return $this->redirectToRoute('profil_detail_cv');
        }

        return $this->render("jobSeeker/profile/cv/detailCv.html.twig",[
            'user' => $jobseeker
        ]);
    }

}
