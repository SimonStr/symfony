<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;

class QuestionController extends AbstractController
{
    /**
     * @Route("/question/{id}", name="question", requirements={"id"="\d+"})
     */
    public function index(Question $question)
    {
        return $this->render('question/index.html.twig', [
            'question' => $question,
        ]);
    }

    /**
     * @Route ("/question/ask", name="app_question_ask")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function askQuestion(Request $request)
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $question->setRelation($this->getUser());
            $question->setDate(new \DateTime());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($question);
            $entityManager->flush();
            return $this->redirectToRoute("question", ['id' => $question->getId()]);
        }

        return $this->render('question/ask.html.twig', [
            'questionForm' => $form->createView()
        ]);
    }
}
