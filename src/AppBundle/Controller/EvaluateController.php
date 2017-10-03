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
     * @Route("/{token}")
     */
    public function evaluateAction(Request $request, $token = null, $uniqueCode = null)
    {
    	$em = $this->getDoctrine()->getManager();

        $getForm = $em->getRepository(Form::class)->createQueryBuilder('ef')
            ->where('ef.token = :token OR ef.uniqueCode = :uniqueCode')
            ->setParameter('token', $token)
            ->setParameter('uniqueCode', $uniqueCode)
            ->getQuery()
            ->getOneorNullResult();

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
            	$checkStudent = $em->getRepository(Student::class)->findOneBy(array('weltecId' => $stud));

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
}
