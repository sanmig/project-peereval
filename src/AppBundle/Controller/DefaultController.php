<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="login")
     */
    public function indexAction(Request $request)
    {
        $authenticalHelper = $this->get('security.authentication_utils');

        return $this->render(
            'default/index.html.twig',
            array(
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

        $form = $this->createFormBuilder()
            ->add('buildform', SubmitType::class, array('label' => 'Build Form'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            if($form->get('buildform')->isClicked()){
                return $this->redirectToRoute('buildform');
            }
        }

        return $this->render('default/homepage.html.twig', array('form' => $form->createView()
            ));
    }
}
