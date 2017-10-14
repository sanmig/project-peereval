<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{Form, Question, Team, Person};
use AppBundle\Form\{FormType, TeamType};
use AppBundle\Utils\Email;

class BuildFormController extends Controller
{

    /**
     * @Route("/dashboard/build-form/diy-form", name="diyform")
     */
    public function diyBuildAction(Request $request)
    {
    	$templateForm = new Form(); //create template form
        
        $templateQuestion = new Question(); //initiate question 
        $templateForm->getQuestions()->add($templateQuestion); //add it to a collection array if theres many questions

        //create form
        $form = $this->createForm(FormType::class, $templateForm);

        //handle form submission
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
            	$templateForm->setUserId($user);

            	//loop get questions array in eval form
            	foreach($templateForm->getQuestions() as $questions){

            		//set foreign key form in questions table
                	$questions->setFormId($templateForm);

                	//save to database
                	$em->persist($questions);
                	$em->flush();
            	}
            //get the id of form
            $getId = $templateForm->getId();

            //pass the id to form_question param
            return $this->redirectToRoute('form_question', array(
                'id' => $getId));
        	}
    	}

    	//generate website
        return $this->render('buildForm/diy.html.twig', array('form' => $form->createView()
        ));
    }

    /**
     * @Route("/dashboard/build-form/form/{id}", name="form_question")
     */
    public function formBuildAction(Request $request, $id)
    {
    	//open up doctrine manager to access entity functions
        $em = $this->getDoctrine()->getManager();

        //fetch row in form tables where limit is 1
        $templateForm = $em->getRepository(Form::class)->findOneBy(array('id' => $id));

        //fetch rows in questions table that matches form id - FK
        $questions = $em->getRepository(Question::class)->findBy(array('formId' => $templateForm));

        $team = new Team(); //initiate team object

        //create form
        $form = $this->createForm(TeamType::class, $createForm);

        //handle form submission
        $form->handleRequest($request);

        //create an array that seperates emails and names
        $emails = array();
        $names = array();
        
        //check if the request is POST
        if ($request->isMethod('POST')){

        	//check if form was submit or still valid
            if ($form->isSubmitted() && $form->isValid()){

            	//get all the datas from email input in view
                $people = $request->request->get('people');

                //remove all white spaces
                $noSpaces = preg_replace('/\s+/','',$people);

                //seperate words and store it in array
                $array = preg_split('/(\s+|:|,)/', $noSpaces);

                //loop array of words
                foreach($array as $person){
                	//if its not email
                    if (!filter_var($person, FILTER_VALIDATE_EMAIL)){
                        $names[] = $person;
                    }
                    else {
                        $emails[] = $person;
                    }
                }

                //save team to DB
                $team->setFormId($templateForm);
                $em->persist($team);
                $em->flush();

                //create array that store person object to persons
                $persons = array();

                //loop persons and save it to DB
                for ($i = 0; $i < count($emails); $i++){
                    $person = new Person();
                    $person->setName($names[$i]);
                    $person->setEmail($emails[$i]);
                    $person->setTeamId($team);

                    $em->persist($person);
                    $em->flush();

                    $persons[] = $person; //store person obj to array
                }
                //get user of this session
                $user = $this->getUser();

                //get dates
                $start = $team->getAddedAt()->format('d/m/Y');
 -              $end = $team->getExpiryAt()->format('d/m/Y');

                $email = new Email(); //initiate email obj

                //send email
                $email->send($persons,$start,$end, $user->getFirstName(),$user->getEmail());

                //return $this->redirectToRoute('homepage');
            }
        }

        return $this->render('buildForm/buildForm.html.twig', array(
            'questions' => $questions,
            'form' => $form->createView()
        ));
    }
}
