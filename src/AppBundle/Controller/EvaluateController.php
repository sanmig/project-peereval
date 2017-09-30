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
    public function reviewAction($fullName, $weltecId)
    {
    	$em = $this->getDoctrine()->getManager();

        $getStudForm = $em->getRepository(Student::class)->findBy(array(
        	'fullName' => $fullName,
            'weltecId' => $weltecId));

        $formAnswerRepository = $em->getRepository(EvalForm::class)->findOneBy(array(
            'student' => $getStudForm));

        $getForm = $formAnswerRepository->getForm();

        $getQuestions = $em->getRepository(Form::class)->findBy(array('id' => $getForm));

        $questions = $em->getRepository(Question::class)->findBy(array('formId' => $getQuestions));

        $answers = $em->getRepository(Answer::class)->findBy(array(
            'formId' => $getStudForm));

        $evalForm = new EvaluationForm();

        foreach($answers as $answer){
        	$evalForm->getAnswers()->add($answer);
        }

        $form = $this->createForm(EvaluationReviewType::class, $evalForm);

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
