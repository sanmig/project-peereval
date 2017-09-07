<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;

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
            ->add('diy', SubmitType::class, array('label' => 'DIY'))
            ->add('pre', SubmitType::class, array('label' => 'Predefined'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            if($form->get('diy')->isClicked()){
                return $this->redirectToRoute('createQuestion');
            }
            else if($form->get('pre')->isClicked()){
                return $this->redirectToRoute('predefinedQuestion');
            }
        }

        return $this->render('default/homepage.html.twig', array('form' => $form->createView()
            ));
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        // Create a new blank user and process the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the new users password
            
            $encoder = $this->get('security.password_encoder');
            $password = $encoder->encodePassword($user, $user->getPlainPassword());

            $user->setPassword($password);

            $user->setRole('Role_USER');

            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render('default/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
