<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\{EvaluationForm, Student, Question, Answer};
use AppBundle\Form\EvaluationReviewType;

class ReviewController extends Controller
{
	/**
     * @Route("/review/{id}/", name="review")
     * @Method({"GET"})
     */
    public function reviewAction($id)
    {
    	$em = $this->getDoctrine()->getManager();

        $evalFormRepository = $em->getRepository(EvaluationForm::class)->findBy(array(
            'student' => $id));

        $student = $em->getRepository(Student::class)->findOneBy(array(
        	'id' => $id));

        $questions = $em->getRepository(Question::class)->findBy(array('formId' => $evalFormRepository));

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
