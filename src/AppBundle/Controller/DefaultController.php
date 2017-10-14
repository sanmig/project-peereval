<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\{Form, EvaluationForm, Student};
use AppBundle\Utils\PDFGenerator;
use AppBundle\Form\HomeType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="login")
     */
    public function indexAction(Request $request)
    {
    	//get security authentication service
        $authenticalHelper = $this->get('security.authentication_utils');

        //create form
        $form = $this->createForm(HomeType::class);

        //handle form submission
        $form->handleRequest($request);

        //check form is submit or valid
        if($form->isSubmitted() && $form->isValid()){

        	//get unique code data input
            $uniqueCode = $form->get('code')->getData();

            //redirect to evaluate page if correct
            return $this->redirectToRoute('evaluate', array(
                    'uniqueCode' => $uniqueCode));
        }
        //render view
        return $this->render(
            'default/index.html.twig',
            array(
                'form' => $form->createView(),
                'last_username' => $authenticalHelper->getLastUsername(),
                'error' => $authenticalHelper->getLastAuthenticationError(),
                )
            );
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function logincheckAction()
    {
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
    }

    /**
     * @Route("/dashboard", name="homepage")
     */
    public function homeAction(Request $request)
    {
    	//render view
        return $this->render('homepage/homepage.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutcheckAction()
    {
        //render view
        return $this->render('default/about.html.twig');
    }
}
