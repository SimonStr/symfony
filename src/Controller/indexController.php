<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class indexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(QuestionRepository $questionRepository)
    {
        $questions = $questionRepository->findBy([], ['date' => 'DESC']);
        return $this->render('pages/index.html.twig', [
            'questions' => $questions,
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('pages/about.html.twig');
    }
}