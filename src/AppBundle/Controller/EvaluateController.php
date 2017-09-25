<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{Question, Answer, EvaluationForm, FormAnswer};
use AppBundle\Form\FormAnswerType;

class EvaluateController extends Controller
{
	/**
     * @Route("/evaluate", name="evaluate")
     */
    public function evaluateAction(Request $request, $code)
    {
    	$em = $this->getDoctrine()->getManager();

    	$evalForms = $em->getRepository(EvaluationForm::class)->findAll();

    	$formId = 0;
    	foreach($evalForms as $evalForm){
    		if($evalForm->getCode() == $code){
    			$formId = $evalForm->getId();
    		}
    	}

    	$questions = $em->getRepository(Question::class)->findOneBy(array('form_id' => $formId));

    	$fa = new FormAnswer();

    	foreach ($questions as $question){
    		$fa->getQuestion()->add($question);
    		$answer = new Answer();
    		$fa->getAnswers()->add($answer);
    	}

        $form = $this->createForm(FormAnswerType::class, $ea);
        $form->handleRequest($request);

        if($request->isMethod('POST')){
        	if($form->isSubmitted() && $form->isValid()){

        		$fa->addStudent($em);
        		foreach($fa->getAnswers() as $answers){

        			$answers->setFormId($formId);

        			$em->persist($em);
        			$em->flush();
        		}
        	}
        }

    	return $this->render('buildForm/pre.html.twig', array(
    		'questions' => $questions,
    		'form' => $form->createView(),
    	));
    }
}
