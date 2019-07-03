<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class indexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
//        return new Response("This is a homepaga");
        return $this->render('pages/index.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('pages/about.html.twig');
    }
}