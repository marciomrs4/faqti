<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ClienteEmail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Clienteemail controller.
 *
 * @Route("clienteemail")
 */
class ClienteEmailController extends Controller
{
    /**
     * Lists all clienteEmail entities.
     *
     * @Route("/", name="clienteemail_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clienteEmails = $em->getRepository('AppBundle:ClienteEmail')->findAll();

        return $this->render('clienteemail/index.html.twig', array(
            'clienteEmails' => $clienteEmails,
        ));
    }

    /**
     * Creates a new clienteEmail entity.
     *
     * @Route("/new", name="clienteemail_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $clienteEmail = new Clienteemail();
        $form = $this->createForm('AppBundle\Form\ClienteEmailType', $clienteEmail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clienteEmail);
            $em->flush();

            return $this->redirectToRoute('clienteemail_show', array('id' => $clienteEmail->getId()));
        }

        return $this->render('clienteemail/new.html.twig', array(
            'clienteEmail' => $clienteEmail,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a clienteEmail entity.
     *
     * @Route("/{id}", name="clienteemail_show")
     * @Method("GET")
     */
    public function showAction(ClienteEmail $clienteEmail)
    {
        $deleteForm = $this->createDeleteForm($clienteEmail);

        return $this->render('clienteemail/show.html.twig', array(
            'clienteEmail' => $clienteEmail,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing clienteEmail entity.
     *
     * @Route("/{id}/edit", name="clienteemail_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ClienteEmail $clienteEmail)
    {
        $deleteForm = $this->createDeleteForm($clienteEmail);
        $editForm = $this->createForm('AppBundle\Form\ClienteEmailType', $clienteEmail);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clienteemail_edit', array('id' => $clienteEmail->getId()));
        }

        return $this->render('clienteemail/edit.html.twig', array(
            'clienteEmail' => $clienteEmail,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a clienteEmail entity.
     *
     * @Route("/{id}", name="clienteemail_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ClienteEmail $clienteEmail)
    {
        $form = $this->createDeleteForm($clienteEmail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($clienteEmail);
            $em->flush();
        }

        return $this->redirectToRoute('clienteemail_index');
    }

    /**
     * Creates a form to delete a clienteEmail entity.
     *
     * @param ClienteEmail $clienteEmail The clienteEmail entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ClienteEmail $clienteEmail)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clienteemail_delete', array('id' => $clienteEmail->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
