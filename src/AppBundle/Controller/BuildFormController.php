<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{EvaluationForm, Question, Student};
use AppBundle\Form\{EvaluationFormType};

class BuildFormController extends Controller
{

    /**
     * @Route("/diy-form", name="diyform")
     */
    public function diyBuildAction(Request $request)
    {
    	$fq = new EvaluationForm(); //initiate evaluation form

    	//loop 3 questions
        for ($i = 1; $i <= 3; $i++){
            $question = new Question(); //initiate question

            //get question from evaluation entity and add question in array collection
            $fq->getQuestions()->add($question);
        }

        //generate form
        $form = $this->createForm(EvaluationFormType::class, $fq);

        //let form handle request
        $form->handleRequest($request);

        //check if the request is POST
        if ($request->isMethod('POST')){

        	//check if form was submit or still valid
        	if ($form->isSubmitted() && $form->isValid()){

        		//get entity manager
            	$em = $this->getDoctrine()->getManager();

            	//get user session
            	$user = $this->getUser();

            	//store user to user_id in eval form
            	$fq->setUserId($user);

            	//loop get questions array in eval form
            	foreach($fq->getQuestions() as $questions){

            		//set foreign key form_id in questions table
                	$questions->setFormId($fq);

                	//save to database
                	$em->persist($questions);
                	$em->flush();
            	}
            //return $this->redirectToRoute('confirmation');
        	}
    	}

    	//generate website
        return $this->render('buildForm/diy.html.twig', array('form' => $form->createView()
        ));
    }

    /**
     * @Route("/pre-form", name="preform")
     */
    public function preBuildAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();

    	$questions = $em->getRepository(Question::class)->findAll();

    	$fq = new FormQuestion(); //initiate evaluation form

    	foreach ($questions as $question){
    		$fq->getQuestion()->add($question);
    	}

        //generate form
        $form = $this->createForm(FormQuestionType::class, $fq);

        //let form handle request
        $form->handleRequest($request);

        //check if the request is POST
        if ($request->isMethod('POST')){

        	//check if form was submit or still valid
        	if ($form->isSubmitted() && $form->isValid()){

            	//get user session
           		$user = $this->getUser();

            	//store user to user_id in eval form
            	$fq->setUserId($user);

            	//loop get questions array in eval form
            	foreach($fq->getQuestions() as $questions){

            		//set foreign key form_id in questions table
                	$questions->setFormId($fq);

                	//save to database
                	$em->persist($questions);
                	$em->flush();
            	}
            //return $this->redirectToRoute('confirmation');
        	}
    	}

    	//generate website
        return $this->render('buildForm/pre.html.twig', array('form' => $form->createView()
        ));
    }
}
