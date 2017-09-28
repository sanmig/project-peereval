<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function indexAction(Request $request)
    {
        $authenticalHelper = $this->get('security.authentication_utils');

        return $this->render(
            'login/index.html.twig',
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
        return $this->render('homepage/homepage.html.twig');
    }

    /**
     * @Route("/", name="front_page")
     */
    public function frontAction(Request $request)
    {
        $form1 = $this->createFormBuilder()
            ->add('code')
            ->getForm();

        $form2 = $this->createFormBuilder()
            ->add('name')
            ->add('studentId')
            ->getForm();

        if ($request->isMethod('POST')){

            $form1->handleRequest($request);
            $form2->handleRequest($request);
            if($form1->isSubmitted()){

                $uniqueCode = $form1->get('code')->getData();

                return $this->redirectToRoute('evaluate', array(
                    'uniqueCode' => $uniqueCode));
            }
            else if ($form2->isSubmitted()){

                $fullName = $form2->get('name')->getData();
                $weltecId = $form2->get('studentId')->getData();

                return $this->redirectToRoute('review', array(
                    'fullName' => $fullname,
                    'weltecId' => $weltecId));
            }
        }
        return $this->render('front/front.html.twig', [
            'form1' => $form1->createView(),
            'form2' => $form2->createView(),
        ]);
    }
}
