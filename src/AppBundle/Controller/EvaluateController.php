<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{Student, Question, Answer, EvaluationForm, FormAnswer};
use AppBundle\Form\FormAnswerType;

class EvaluateController extends Controller
{
	/**
     * @Route("/evaluate", name="evaluate")
     */
    public function evaluateAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();

    	$fq = $em->getRepository(EvaluationForm::class)->findOneBy(array('uniqueCode' => 'WV4HA'));

        $questions = $em->getRepository(Question::class)->findBy(array('formId' => $fq));

        $fa = new FormAnswer();

        $student = new Student();
        $fa->getStudents()->add($student);

        foreach($questions as $question){
            $answer = new Answer();
            $fa->getAnswers()->add($answer);
        }

        $form = $this->createForm(FormAnswerType::class, $fa);

        $form->handleRequest($request);

        if($request->isMethod('POST')){
            if($form->isSubmitted() && $form->isValid()){

                $fa->setFormId($fq);
                $em->persist($fa);
                $em->flush();

                foreach($fa->getStudents() as $student){
                    
                    $student->setFormId($fa);

                    $em->persist($answer);
                    $em->flush();
                }

                foreach($fa->getAnswers() as $answers){
                    
                    $answers->setFormId($fa);

                    $em->persist($answers);
                    $em->flush();
                }
            }
        }

    	return $this->render('buildForm/pre.html.twig', array(
            'fq' => $fq,
            'questions' => $questions,
    		'form' => $form->createView(),
    	));
    }
}
