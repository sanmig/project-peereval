<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BuildFormController extends Controller
{
    /**
     * @Route("/diy" name="buildform")
     */
    public function diyAction()
    {
        return $this->render('AppBundle:BuildForm:diy.html.php', array(
            // ...
        ));
    }

    /**
     * @Route("/pre" name="predefined")
     */
    public function preAction()
    {
        return $this->render('AppBundle:BuildForm:pre.html.php', array(
            // ...
        ));
    }

}
