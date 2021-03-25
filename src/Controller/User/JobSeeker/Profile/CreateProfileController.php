<?php

declare(strict_types=1);

namespace App\Controller\User\JobSeeker\Profile;


use App\Entity\Job\Cv;
use App\Entity\User\Jobseeker;
use App\Form\User\JobSeeker\CvFormType;
use App\Manager\CvManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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
     * @param CvManager $manager
     * @return Response
     * @IsGranted("ROLE_JOB_SEEKER",message="vous n'avez pas le droit")
     */
    public function create(Request $request,CvManager $manager):Response
    {

        /** @var Jobseeker $user */
        $user = $this->getUser();
        $cv   =  $this->cvFactory($user);
        $form =  $this->createForm(CvFormType::class,$cv);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            /** @var Cv $cv */
            $cv = $form->getData();
            $cv->setExperienceLevels($request->request->get('cv_form')['experienceLevels']);
            $manager->create($cv);

            return $this->redirectToRoute('profil_detail_cv');
        }

        return $this->render("jobSeeker/profile/cv/createCv.html.twig",[
            'form' => $form->createView()
        ]);
    }


    private function cvFactory(Jobseeker $user):Cv
    {
        $cv = new Cv();
        $cv->setExperienceLevels( (string) $user->getExperienceLevels());
        $cv->setAddress($user->getAddress());
        $cv->setCategories($user->getCategory());
        $cv->setProfileTitle($user->getProfileTitle());
        $cv->setPhoneNumber($user->getPhoneNumber());
        $cv->setSkills($user->getSkills());

        return $cv;
    }

}
