<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\{Form, EvaluationForm, Student};

class DefaultController extends Controller
{
    /**
     * @Route("/", name="login")
     */
    public function indexAction(Request $request)
    {
        $authenticalHelper = $this->get('security.authentication_utils');

        $form = $this->createFormBuilder()
            ->add('code', TextType::class, array(
                'label' => false,))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $uniqueCode = $form->get('code')->getData();

            return $this->redirectToRoute('evaluate', array(
                    'uniqueCode' => $uniqueCode));
        }

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
     * @Route("/homepage", name="homepage")
     */
    public function homeAction(Request $request)
    {
    	$user = $this->getUser();

    	$em = $this->getDoctrine()->getManager();

    	$forms = $em->getRepository(Form::class)->findBy(array('userId' => $user));

        return $this->render('homepage/homepage.html.twig', array(
        	'forms' => $forms,
            //'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/list/{id}/", name="form_list")
     */
    public function formAction($id)
    {
    	$em = $this->getDoctrine()->getManager();

    	$evalForm = $em->getRepository(EvaluationForm::class)->findBy(array('formId' => $id));

    	$students = $em->getRepository(Student::class)->findBy(array('id' => $evalForm));

    	return $this->render('homepage/forms.html.twig', array(
    		'students' => $students));
    }
}
