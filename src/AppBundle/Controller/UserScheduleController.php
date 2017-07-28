<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserScheduleController extends Controller
{
    /**
     * @Route("/user-schedule")
     */
    public function indexAction()
    {
        $path = $this->getParameter('kernel.project_dir');

        $users = file($path.'/web/files/Escala.csv');

        $lista = array();

        foreach($users as $user){

            $lista[] = explode(";",$user);

        }

        return $this->render('AppBundle:UserSchedule:index.html.twig', array(
           'users' => $lista,
        ));
    }

}
