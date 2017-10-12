<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{Person, Team, Question, Answer, EvaluationForm};
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

        if(!$person){
            throw $this->createNotFoundException('This page does not exist.');
        }

        $team = $em->getRepository(Team::class)->findOneBy(array('id' => $person->getTeamId()));

        $questions = $em->getRepository(Question::class)->findBy(array('formId' => $team->getFormId()));

        $map = array();

        foreach($team->getPeople() as $peep){
        	if($peep->getName() !== $person->getName()){
        		$name = $peep->getName();
        		foreach($questions as $question){
        			$map[$name][] = $question;
        		}
        	}
        }

        $evalForm = new EvaluationForm();

        foreach($map as $key => $name){
        	foreach($map[$key] as $value){
        		$answer = new Answer();
        		$evalForm->getAnswers()->add($answer);
        	}
        }

        $form = $this->createForm(EvaluationFormType::class, $evalForm);

        $form->handleRequest($request);

        if($request->isMethod('POST')){
        	if($form->isSubmitted() && $form->isValid()){
        		
        		$evalForm->setTeamId($team);
        		$evalForm->setPersonId($person);
        		$em->persist($evalForm);
                $em->flush();

                foreach($evalForm->getAnswers() as $answer){
                	//
                }
        	}
        }

    	return $this->render('evaluate/evaluate.html.twig', array(
    		'person' => $person,
    		'getForm' => $team,
    		'map' => $map,
    		'form' => $form->createView(),
    	));
    }
}
