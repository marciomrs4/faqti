<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('::view.html.twig');
    }

    /**
     * @Route("/home",name="home")
     */
    public function homeAction()
    {
        return $this->render('::view.html.twig');
    }

    /**
     * @Route("/view", name="view")
     */
    public function viewAction()
    {


        return $this->render('::view.html.twig');

    }
}
