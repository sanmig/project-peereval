<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{QuestionMain,AnswerMain,EvaluationAnswer};
use AppBundle\Form\EvaluationAnswerType;

class EvaluateController extends Controller
{
	/**
     * @Route("/evaluate", name="evaluate")
     */
    public function evaluateAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$questions = $em->getRepository('AppBundle:QuestionMain')->findAll();

    	$ea = new EvaluationAnswer();
    	foreach ($questions as $question){
    		$ea->getQuestion()->add($question);
    		$answer = new AnswerMain();
    		$answers = $answer->setAnswer($answer);
    		$ea->getAnswer()->add($answers);

    	}
        $form = $this->createForm(EvaluationAnswerType::class, $ea);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Save
            $em->persist($ea);
            $em->flush();
        }

    	return $this->render('buildForm/pre.html.twig', array(
    		'form' => $form->createView(),
    	));
    }
}
