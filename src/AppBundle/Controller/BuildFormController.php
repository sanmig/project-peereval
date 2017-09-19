<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{FormQuestion,Question, Answer};
use AppBundle\Form\{FormQuestionType, FormType};

class BuildFormController extends Controller
{

    /**
     * @Route("/diy-form", name="buildform")
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

            $quest = new Question();

            foreach($quest as $q){

                $ans = new Answer();
                $ans->setQuestionId($q);

                $em->persist($ans);
                $em->flush();
            }
        }
        return $this->render('buildForm/diy.html.twig', array('form' => $form->createView()
        ));
    }


    /**
     * @Route("/confirm", name="confirmation")
     */
    public function confirmationAction()
    {
        
    }

}
