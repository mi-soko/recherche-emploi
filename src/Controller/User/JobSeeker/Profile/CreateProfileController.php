<?php

declare(strict_types=1);

namespace App\Controller\User\JobSeeker\Profile;


use App\Form\User\JobSeeker\CvFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @return Response
     */
    public function create(Request $request):Response
    {
        $form =  $this->createForm(CvFormType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            dd($form->getData());
        }

        return $this->render("jobSeeker/profile/cv/createCv.html.twig",[
            'form' => $form->createView()
        ]);
    }


}
