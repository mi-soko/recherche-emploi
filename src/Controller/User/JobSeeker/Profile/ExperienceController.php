<?php

declare(strict_types=1);


namespace App\Controller\User\JobSeeker\Profile;


use App\Entity\Job\Experience;
use App\Entity\User\Jobseeker;
use App\Form\User\JobSeeker\ExperienceFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CreateExperienceController
 * @package App\Controller\User\JobSeeker\Profile
 */
final class ExperienceController extends AbstractController
{

    /**
     * @Route("/profile/cv/experience/create",name="app_jobseeker_create_experience")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request):Response
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


    /**
     * @Route("/profile/cv/experience/{id}/delete",name="app_jobseeker_delete_experience")
     * @param Experience $experience
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function delete(Experience $experience,EntityManagerInterface $manager):Response
    {
        if(!$experience){
            $this->createNotFoundException("L'objet Introuvable");
        }

        $manager->remove($experience);
        $manager->flush();

        return $this->redirectToRoute('profil_detail_cv');
    }

    /**
     * @Route("/profile/cv/experience/{id}/update",name="app_jobseeker_update_experience")
     * @param Experience $experience
     * @param EntityManagerInterface $manager
     * @param Request $request
     * @return Response
     */
    public function update(Experience $experience,EntityManagerInterface $manager,Request $request):Response
    {
        if(!$experience){
            $this->createNotFoundException("L'objet Introuvable");
        }

        $form = $this->createForm(ExperienceFormType::class,$experience)->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->flush();
            return $this->redirectToRoute('profil_detail_cv');
        }
        return $this->render('/jobSeeker/profile/cv/createExperience.html.twig',[
            'form' => $form->createView(),
            'user' => $this->getUser()
        ]);

    }

}
