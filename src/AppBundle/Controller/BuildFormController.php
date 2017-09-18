<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{FormQuestion,Question, Form};
use AppBundle\Form\FormQuestionType;

class BuildFormController extends Controller
{

    /**
     * @Route("/build-form", name="buildform")
     */
    public function buildAction(Request $request)
    {
    	$fq = new FormQuestion();

        for ($i = 1; $i <= 3; $i++){
            $question = new Question();
            $fq->getQuestions()->add($question);
        }

        $form = $this->createForm(FormQuestionType::class, $fq);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();

            foreach($fq->getQuestions() as $questions){
                $questions->setFormId($fq);
                $em->persist($questions);
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
