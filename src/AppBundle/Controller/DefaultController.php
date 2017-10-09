<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\{Form, EvaluationForm, Student};
use AppBundle\Utils\PDFGenerator;

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
     * @Route("/dashboard", name="homepage")
     */
    public function homeAction(Request $request)
    {

        return $this->render('homepage/homepage.html.twig');
    }
}
