<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{Form, Question, Student};
use AppBundle\Form\{FormType, PreFormType};
use AppBundle\Utils\{Email, PredefinedQuestions};

class BuildFormController extends Controller
{

    /**
     * @Route("/dashboard/diy-form", name="diyform")
     */
    public function diyBuildAction(Request $request)
    {
    	$createForm = new Form(); //initiate evaluation form

    	//loop 3 questions
        //for ($i = 1; $i <= 3; $i++){
            //$question = new Question(); //initiate question

            //get question from evaluation entity and add question in array collection
            //$createForm->getQuestions()->add($question);
        //}
        
        $question = new Question();
        $createForm->getQuestions()->add($question);

        //generate form
        $form = $this->createForm(FormType::class, $createForm);

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
            	$createForm->setUserId($user);

            	//loop get questions array in eval form
            	foreach($createForm->getQuestions() as $questions){

            		//set foreign key form in questions table
                	$questions->setFormId($createForm);

                	//save to database
                	$em->persist($questions);
                	$em->flush();
            	}
                
            $start = $createForm->getAddedAt()->format('d/m/Y');
            $end = $createForm->getExpiryAt()->format('d/m/Y');
            $code = $createForm->getUniqueCode();
            $token = $createForm->getToken();

            $emails = $request->get('emails');
            $list = explode(',', $emails);
            $emailClass = new Email();

            foreach($list as $email){
                $emailClass->send($email, $code, $token, $start, $end);
            } 
            return $this->redirectToRoute('homepage');
        	}
    	}

    	//generate website
        return $this->render('buildForm/diy.html.twig', array('form' => $form->createView()
        ));
    }

    /**
     * @Route("/dashboard/pre-form", name="preform")
     */
    public function preBuildAction(Request $request)
    {
        $questions = new PredefinedQuestions();

        $createForm = new Form();

        $questionList = $questions->getQuestion();

        for ($i = 1; $i <= count($questionList); $i++){
            foreach($questionList[$i] as $item){
                $questionEntity = new Question();
                $questionEntity->setQuestionText($item);
                $createForm->getQuestions()->add($questionEntity);
            }
        }

        //generate form
        $form = $this->createForm(PreFormType::class, $createForm);

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
                $createForm->setUserId($user);

                //loop get questions array in eval form
                foreach($createForm->getQuestions() as $questions){

                    //set foreign key form in questions table
                    $questions->setFormId($createForm);

                    //save to database
                    $em->persist($questions);
                    $em->flush();
                }
                
            $start = $createForm->getAddedAt()->format('d/m/Y');
            $end = $createForm->getExpiryAt()->format('d/m/Y');
            $code = $createForm->getUniqueCode();
            $token = $createForm->getToken();

            $emails = $request->get('emails');
            $list = explode(',', $emails);
            $emailClass = new Email();

            foreach($list as $email){
                $emailClass->send($email, $code, $token, $start, $end);
            } 
            return $this->redirectToRoute('homepage');
            }
        }

        return $this->render('buildForm/pre.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
