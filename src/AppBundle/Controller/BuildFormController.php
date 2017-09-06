<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\EvaluationForm;
use AppBundle\Form\EvaluationFormType;

class BuildFormController extends Controller
{
    /**
     * @Route("/build-form", name="buildform")
     */
    public function buildAction()
    {
        
    }

    /**
     * @Route("/diy-form", name="createQuestion")
     */
    public function buildDiyAction()
    {
        //$ev = new EvaluationForm();
        //$form = $this->createForm(EvaluationFormType::class, $ev);
        //$form->handleRequest($request);

        //if($form->isSubmitted() && $form->isValid()){

            //$em = $this->getDoctrine()->getManager();
            //$em->persist($ev);
            //$em->flush();

            //return $this->redirectToRoute('confirmation');
        //}
        return $this->render('buildForm/diy.html.twig');
    }

    /**
     * @Route("/pre-defined-form", name="predefinedQuestion")
     */
    public function buildPreAction()
    {
        //placebo
        //$ev = new EvaluationForm();
        //$form = $this->createForm(EvaluationFormType::class, $ev);
        //$form->handleRequest($request);

        //if($form->isSubmitted() && $form->isValid()){

            //$em = $this->getDoctrine()->getManager();
            //$em->persist($ev);
            //$em->flush();

            //return $this->redirectToRoute('confirmation');
        //}
        return $this->render('buildForm/pre.html.twig');
    }

    /**
     * @Route("/confirm", name="confirmation")
     */
    public function confirmationAction()
    {
        
    }

}
