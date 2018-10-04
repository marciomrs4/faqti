<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Form\SendEmailOCType;
use Symfony\Component\HttpFoundation\Request;

class SendEmailOCController extends Controller
{
    /**
     * @Route("/sendmail")
     * @Method({"POST","GET"})
     */
    public function sendmailAction(Request $request)
    {
        $form = $this->createForm(SendEmailOCType::class);

        $listaOc = array();

        $novaMensagem = '';

        if($request->isMethod('POST')){

            $oc = $request->request->get('appbundle_sendmailoc');

            $listaOc = array_unique(explode(" ",$oc['oc']));

            $cliente = substr($listaOc['0'],0,2);



            $entity = $this->getDoctrine()->getRepository('AppBundle:ClienteEmail')
                      ->findOneBy(array('cliente' => $cliente));

            $mensagem = $entity->getMensagem();

            $novaMensagem = str_replace('#oc',implode(", ",$listaOc),$mensagem);


            $novaMensagem = str_replace(array("\r"),'<br>',$novaMensagem);

            //dump($novaMensagem); exit();


            $mailer = $this->get('mailer');


            $messsaSend = (new \Swift_Message($novaMensagem))
                        ->setFrom('sistemas.oc@ceadis.org.br')
                        ->setSubject('Ordem de Compra')
                        ->setBody(
                            $this->renderView('AppBundle:SendEmailOC:templateEmailOC.html.twig',
                            array('mensagem' => $novaMensagem),'text/plain'
                            ))
                        ->setContentType('text/html');


            $emails = explode(',',$entity->getEmails());

            foreach($emails as $email){
                $messsaSend->addTo($email);
            }

            $mailer->send($messsaSend);


        }

        return $this->render('AppBundle:SendEmailOC:sendmail.html.twig', array(
            'form' => $form->createView(),
            'mensagem' => $novaMensagem
        ));
    }

}
