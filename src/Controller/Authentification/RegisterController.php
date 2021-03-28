<?php


namespace App\Controller\Authentification;

use App\Entity\User\User;
use App\Form\UserFormType;
use App\Manager\UserAuthManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{

    /**
     * @param Request $request
     * @param UserAuthManager $manager
     * @return Response
     * @Route("/register",name="app_register")
     */
    public function __invoke(Request $request,UserAuthManager $manager):Response
    {
        $controller = $request->query->get('account','job-seeker');

        $form =  $this->createForm(UserFormType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

            /** @var User $user */
            $user = $form->getData();

            $manager->save($user);
            $this->addFlash('success',"Votre compte a bien été créer. Viellez vous identifier");
            return $this->redirectToRoute('app_login');
        }


        return $this->render("security/register.html.twig",[
            'form' => $form->createView(),
            'templateName' => $controller === 'job-seeker' ? 'job-seeker' : 'compagnie'
        ]);
    }

}
