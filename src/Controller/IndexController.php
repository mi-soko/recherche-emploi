<?php

/**
 * @author       : Soko Mamadou ibrahima
 * @email        : mamadousoko98@gmail.com
 * @phone_number : +221772199737 / +22248796401
 */

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Job\Categories;
use App\Entity\User\Jobseeker;
use App\Repository\User\JobseekerRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function JobDescriptionList(JobseekerRepository $jobseeker,PaginatorInterface $paginator,Request $request):Response
    {

        if(!$this->getUser()) return $this->redirectToRoute('app_login');

        $jobseekers =  $jobseeker->findAllCategoriesByNotNull();
        $pagination = $paginator->paginate(
            $jobseekers, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            9 /*limit per page*/
        );

        return $this->render("homePage/index.html.twig",[
            'users' => $pagination->getItems(),
            'pagination' => $pagination
        ]);
    }


}
