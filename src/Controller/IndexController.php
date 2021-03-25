<?php

/**
 * @author       : Soko Mamadou ibrahima
 * @email        : mamadousoko98@gmail.com
 * @phone_number : +221772199737 / +22248796401
 */

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User\Jobseeker;
use App\Repository\User\JobseekerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends AbstractController
{
    /**
     * @Route("/",name="app_index")
     * @param JobseekerRepository $jobseeker
     * @return Response
     */
    public function JobDescriptionList(JobseekerRepository $jobseeker):Response
    {
        if(!$this->getUser()) return $this->redirectToRoute('app_login');
        return $this->render("homePage/index.html.twig",[
            'users' => $jobseeker->findAll()
        ]);
    }


}
