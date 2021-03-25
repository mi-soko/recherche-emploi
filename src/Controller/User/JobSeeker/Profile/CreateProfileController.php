<?php

declare(strict_types=1);

namespace App\Controller\User\JobSeeker\Profile;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CreateProfileController
 * @package App\Controller\User\JobSeeker\Profile
 */
final class CreateProfileController extends AbstractController
{

    /**
     * @Route("/profile/cv/create",name="profil_create_cv")
     * @return Response
     */
    public function create():Response
    {
        return $this->render("jobSeeker/profile/cv/createCv.html.twig");
    }


}
