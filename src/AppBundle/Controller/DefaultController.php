<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="login")
     */
    public function indexAction(Request $request)
    {
        $helper = $this->get('security.authentication_utils');

        return $this->render(
            'default/index.html.php',
            array(
                'last_username' => $helper->getLastUsername(),
                'error' => $helper->getLastAuthenticationError(),
                )
            );
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
    }

    /**
     * @Route("/homepage", name="home")
     */
    public function homeAction(Request $request)
    {
        return $this->render('default/home.html.php');
    }
}
