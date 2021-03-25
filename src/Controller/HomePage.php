<?php

/**
 * @author       : Soko Mamadou ibrahima
 * @email        : mamadousoko98@gmail.com
 * @phone_number : +221772199737 / +22248796401
 */

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomePage
 * @package App\Controller
 */
class HomePage extends AbstractController
{
    /**
     * @Route("/",name="app_index")
     * @return Response
     */
    public function index():Response
    {
        return $this->render("homePage/index.html.twig");
    }

    /**
     * @Route("/profil/detail",name="profil_detail_cv")
     * @return Response
     */
    public function detailCv():Response
    {
        return $this->render("profile/cv/detailCv.html.twig");
    }

}
