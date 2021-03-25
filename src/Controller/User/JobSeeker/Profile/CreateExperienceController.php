<?php

declare(strict_types=1);


namespace App\Controller\User\JobSeeker\Profile;


use App\Entity\Job\Experience;
use App\Entity\User\Jobseeker;
use App\Entity\User\User;
use App\Form\User\JobSeeker\ExperienceFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CreateExperienceController
 * @package App\Controller\User\JobSeeker\Profile
 */
final class CreateExperienceController extends AbstractController
{

    /**
     * @Route("/profile/cv/create-experience",name="app_jobseeker_create_experience")
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request):Response
    {
        $form = $this->createForm(ExperienceFormType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            /** @var Experience $experience */
             $experience = $form->getData();
             /** @var Jobseeker $user */
            $user =  $this->getUser();
            $experience->setJobSeeker($user);
             $this->getDoctrine()->getManager()->persist($experience);
             $this->getDoctrine()->getManager()->flush();

             return $this->redirectToRoute('profil_detail_cv');
        }
      return $this->render('/jobSeeker/profile/cv/createExperience.html.twig',[
          'form' => $form->createView(),
          'user' => $this->getUser()
      ]);
    }

}
