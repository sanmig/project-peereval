<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\EvaluationQuestion;
use AppBundle\Form\EvaluationQuestionType;

class BuildFormController extends Controller
{
    //private $num = 5;

    /**
     * @Route("/build-form", name="buildform")
     */
    public function buildAction(Request $request)
    {
        $form = $this->createForm(EvaluationQuestionType::class);
        $form->handleRequest($request);
        return $this->render('buildForm/diy.html.twig', array('form' => $form->createView()
        ));
    }


    /**
     * @Route("/confirm", name="confirmation")
     */
    public function confirmationAction()
    {
        
    }

}
