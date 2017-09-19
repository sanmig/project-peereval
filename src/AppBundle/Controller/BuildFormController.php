<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{FormQuestion, Question, Student, RegisterStudent};
use AppBundle\Form\{FormQuestionType};

class BuildFormController extends Controller
{

    /**
     * @Route("/diy-form", name="diyform")
     */
    public function diyAction(Request $request)
    {
    	$fq = new FormQuestion();

        for ($i = 1; $i <= 2; $i++){
            $question = new Question();
            $fq->getQuestions()->add($question);
        }

        $form = $this->createForm(FormQuestionType::class, $fq);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();

            $user = $this->getUser();
            $fq->setUserId($user);

            foreach($fq->getQuestions() as $questions){

                $questions->setFormId($fq);

                $em->persist($questions);
                $em->flush();
            }
            //return $this->redirectToRoute('confirmation');
        }
        return $this->render('buildForm/diy.html.twig', array('form' => $form->createView()
        ));
    }


    /**
     * @Route("/confirmation", name="confirmation")
     */
    public function confirmationAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $rs = new RegisterStudent();

        foreach($userForm as $uf){
        	$student = new Student();
        	$rs->getStudents()->add($student);
        }

        if ($form->isSubmitted() && $form->isValid()){

        	$eq = new EvaluationQuestion();

        	$student->setFormId($id);
        	$em->persist();
        	$em->flush();
        }

        return $this->render('buildForm/confirm.html.twig', array(
            'questions' => $questions,
        ));
    }

}
