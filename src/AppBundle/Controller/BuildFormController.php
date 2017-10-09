<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{TemplateForm, Question, Form, Person};
use AppBundle\Form\{TemplateFormType, FormType};
use AppBundle\Utils\PredefinedQuestions;

class BuildFormController extends Controller
{

    /**
     * @Route("/dashboard/diy-form", name="diyform")
     */
    public function diyBuildAction(Request $request)
    {
    	$templateForm = new TemplateForm(); //initiate evaluation form
        
        for($i = 1; $i <= 3; $i++){
            $templateQuestion = new Question();
            $templateForm->getQuestions()->add($templateQuestion);
        }

        //generate form
        $form = $this->createForm(TemplateFormType::class, $templateForm);

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
            	$templateForm->setUserId($user);

            	//loop get questions array in eval form
            	foreach($templateForm->getQuestions() as $questions){

            		//set foreign key form in questions table
                	$questions->setTemplateFormId($templateForm);

                	//save to database
                	$em->persist($questions);
                	$em->flush();
            	}
            $getId = $templateForm->getId();
            return $this->redirectToRoute('form_question', array(
                'id' => $getId));
        	}
    	}

    	//generate website
        return $this->render('buildForm/diy.html.twig', array('form' => $form->createView()
        ));
    }

    /**
     * @Route("/dashboard/form/{id}", name="form_question")
     */
    public function formBuildAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $templateForm = $em->getRepository(TemplateForm::class)->findOneBy(array('id' => $id));

        $questions = $em->getRepository(Question::class)->findBy(array('templateFormId' => $templateForm));

        $createForm = new Form();

        $form = $this->createForm(FormType::class, $createForm);

        $form->handleRequest($request);

        $emails = array();
        $names = array();
        
        if ($request->isMethod('POST')){
            if ($form->isSubmitted() && $form->isValid()){

                $people = $request->request->get('people');
                $noSpaces = preg_replace('/\s+/','',$people);
                $array = preg_split('/(\s+|:|,)/', $noSpaces);

                foreach($array as $person){
                    if (!filter_var($person, FILTER_VALIDATE_EMAIL)){
                        $names[] = $person;
                    }
                    else {
                        $emails[] = $person;
                    }
                }

                $createForm->setFormId($templateForm);
                $em->persist($createForm);
                $em->flush();

                for ($i = 0; $i < count($names); $i++){
                    $person = new Person();
                    $person->setName($names[$i]);
                    $person->setEmail($emails[$i]);
                    $person->setFormId($createForm);

                    $em->persist($person);
                    $em->flush();
                }
            }
        }

        return $this->render('buildForm/buildForm.html.twig', array(
            'questions' => $questions,
            'form' => $form->createView()
        ));
    }
}
