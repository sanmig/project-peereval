<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{EvaluationQuestion,QuestionMain};
use AppBundle\Form\EvaluationQuestionType;

class BuildFormController extends Controller
{

    /**
     * @Route("/build-form", name="buildform")
     */
    public function buildAction(Request $request)
    {
    	$eq = new EvaluationQuestion();

        for ($i = 1; $i <= 3; $i++){
            $question = new QuestionMain();
            $eq->getQuestions()->add($question);
        }

        $form = $this->createForm(EvaluationQuestionType::class, $eq);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser()->getId();
            $eq->setUsers($user);
            foreach ($eq as $question){
                $eq->setQuestions($questions.getId());
                $em->persist($question);
                $em->flush();
            }
        }
        return $this->render('buildForm/diy.html.twig', array('form' => $form->createView()
        ));
    }


    /**
     * @Route("/confirm", name="confirmation")
     */
    public function confirmationAction()
    {
        
    }

}
