<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{Student, Question, Answer, Form, EvaluationForm};
use AppBundle\Form\{EvaluationReviewType,EvaluationFormType};

class EvaluateController extends Controller
{
	/**
     * @Route("/form/{uniqueCode}", name="evaluate")
     */
    public function evaluateAction(Request $request, $uniqueCode)
    {
    	$em = $this->getDoctrine()->getManager();

    	$getForm = $em->getRepository(Form::class)->findOneBy(array('uniqueCode' => $uniqueCode));

        $questions = $em->getRepository(Question::class)->findBy(array(
            'formId' => $getForm));

        $evalForm = new EvaluationForm();

        foreach($questions as $question){
            $answer = new Answer();
            $evalForm->getAnswers()->add($answer);
        }

        $form = $this->createForm(EvaluationFormType::class, $evalForm);

        $form->handleRequest($request);

        if($request->isMethod('POST')){
            if($form->isSubmitted() && $form->isValid()){

            	$stud = $evalForm->getStudent();

            	if(!$stud == null){
            		$em->persist($stud);
                	$em->flush();
            	}

                $evalForm->setFormId($getForm);
                $evalForm->setStudent($stud);
                $evalForm->setStatus(1);
                $em->persist($evalForm);
                $em->flush();

                foreach($evalForm->getAnswers() as $answers){
                    
                    $answers->setFormId($evalForm);

                    $em->persist($answers);
                    $em->flush();
                }
            }
        }

    	return $this->render('evaluate/evaluate.html.twig', array(
            'getForm' => $getForm,
            'questions' => $questions,
    		'form' => $form->createView(),
    	));
    }

    /**
     * @Route("/review", name="review")
     */
    public function reviewAction()
    {
    	$em = $this->getDoctrine()->getManager();

    	$formId = 1;
    	$studId = 2;
        $evalFormRepository = $em->getRepository(EvaluationForm::class)->findOneBy(array(
        	'formId' => $formId,
            'student' => $studId));

        $student = $em->getRepository(Student::class)->findOneBy(array(
        	'id' => $studId));

        $questions = $em->getRepository(Question::class)->findBy(array('formId' => $formId));

        $answers = $em->getRepository(Answer::class)->findBy(array(
            'formId' => $evalFormRepository));

        $evalForm = new EvaluationForm();

        foreach($answers as $answer){
        	$evalForm->getAnswers()->add($answer);
        }

        $form = $this->createForm(EvaluationReviewType::class, $evalForm);

        return $this->render('review/review.html.twig', array(
            'student' => $student,
            'questions' => $questions,
            'form' => $form->createView(),
        ));
    }
}
