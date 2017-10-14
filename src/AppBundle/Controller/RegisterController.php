<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;

class RegisterController extends Controller
{
	/**
     * @Route("/admin/register", name="register")
     */
    public function registerAction(Request $request)
    {
        // Create a new blank user and process the form
        $user = new User();

        //create form
        $form = $this->createForm(UserType::class, $user);

        //handle form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            //encode password encryption
            $encoder = $this->get('security.password_encoder');
            $password = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($password);

            //set role as user of this website
            $user->setRole('ROLE_USER');

            // Save to database
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            //redirect to homepage
            return $this->redirectToRoute('login');
        }

        return $this->render('register/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
