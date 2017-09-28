<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{Student, Question, Answer, EvaluationForm, FormAnswer};
use AppBundle\Form\{FormReviewType,FormAnswerType};

class EvaluateController extends Controller
{
	/**
     * @Route("/evaluate/{formName}")
     * @ParamConverter("uniqueCode", class"AppBundle:EvaluationForm")
     */
    public function evaluateAction(EvaluationForm $uniqueCode)
    {
    	$em = $this->getDoctrine()->getManager();

    	$fq = $em->getRepository(EvaluationForm::class)->findOneBy(array('uniqueCode' => $uniqueCode));

        $questions = $em->getRepository(Question::class)->findBy(array(
            'formId' => $fq));

        $fa = new FormAnswer();

        foreach($questions as $question){
            $answer = new Answer();
            $fa->getAnswers()->add($answer);
        }

        $form = $this->createForm(FormAnswerType::class, $fa);

        $form->handleRequest($request);

        if($request->isMethod('POST')){
            if($form->isSubmitted() && $form->isValid()){

            	$stud = $fa->getStudent();

            	if(!$stud == null){
            		$em->persist($stud);
                	$em->flush();
            	}

                $fa->setForm($fq);
                $fa->setStudent($stud);
                $em->persist($fa);
                $em->flush();

                foreach($fa->getAnswers() as $answers){
                    
                    $answers->setFormId($fa);

                    $em->persist($answers);
                    $em->flush();
                }
            }
        }

    	return $this->render('evaluate/evaluate.html.twig', array(
            'fq' => $fq,
            'questions' => $questions,
    		'form' => $form->createView(),
    	));
    }

    /**
     * @Route("/review", name="review")
     */
    public function reviewAction($fullName, $weltecId)
    {
    	$em = $this->getDoctrine()->getManager();

        $getStudForm = $em->getRepository(Student::class)->findBy(array(
        	'fullName' => $fullName,
            'weltecId' => $weltecId));

        $formAnswerRepository = $em->getRepository(FormAnswer::class)->findOneBy(array(
            'student' => $getStudForm));

        $getForm = $formAnswerRepository->getForm();

        $getQuestions = $em->getRepository(EvaluationForm::class)->findBy(array('id' => $getForm));

        $questions = $em->getRepository(Question::class)->findBy(array('formId' => $getQuestions));

        $answers = $em->getRepository(Answer::class)->findBy(array(
            'formId' => $getStudForm));

        $fa = new FormAnswer();

        foreach($answers as $answer){
        	$fa->getAnswers()->add($answer);
        }

        $form = $this->createForm(FormReviewType::class, $fa);

        return $this->render('review/review.html.twig', array(
            'getStudForm' => $getStudForm,
            //'getForm' => $getForm,
            //'getQuestions' => $getQuestions,
            'questions' => $questions,
            //'answers' => $answers,
            'form' => $form->createView(),
        ));
    }
}
