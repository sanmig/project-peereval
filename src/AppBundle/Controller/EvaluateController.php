<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{Person, Form, Question, Answer, EvaluationForm};
use AppBundle\Form\EvaluationFormType;

class EvaluateController extends Controller
{
	/**
     * @Route("/form/{uniqueCode}", name="evaluate")
     * @Route("/{token}")
     */
    public function evaluateAction(Request $request, $token = null, $uniqueCode = null)
    {
    	$em = $this->getDoctrine()->getManager();

        $person = $em->getRepository(Person::class)->createQueryBuilder('p')
            ->where('p.token = :token OR p.uniqueCode = :uniqueCode')
            ->setParameter('token', $token)
            ->setParameter('uniqueCode', $uniqueCode)
            ->getQuery()
            ->getOneorNullResult();

        $getForm = $em->getRepository(Form::class)->findOneBy(array('id' => $person->getFormId()));

        $questions = $em->getRepository(Question::class)->findBy(array('templateFormId' => $getForm->getFormId()));

        $map = array();
        foreach($getForm->getPeople() as $peep){
        	if($peep->getName() !== $person->getName()){
        		$name = $peep->getName();
        		foreach($questions as $question){
        			$map[$name][] = $question;
        		}
        	}
        }

        $evalForm = new EvaluationForm();

        $mapAnswer = array();

        foreach($map as $key => $name){
        	foreach($map[$key] as $value){
        		$answer = new Answer();
        		$ans = $evalForm->getAnswers()->add($answer);
        		$mapAnswer[$key][] = $ans;
        	}
        }

        $form = $this->createForm(EvaluationFormType::class, $evalForm);

        $form->handleRequest($request);

        if($request->isMethod('POST')){
        	if($form->isSubmitted() && $form->isValid()){
        		
        		foreach($evalForm->getAnswers() as $answer){
        			//
        		}
        	}
        }

    	return $this->render('evaluate/evaluate.html.twig', array(
    		'person' => $person,
    		'getForm' => $getForm,
    		'map' => $map,
    		'form' => $form->createView(),
    	));
    }
}
