<?php

namespace AppBundle\Controller;

use AppBundle\Entity\faqti;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Faqti controller.
 *
 * @Route("faqti")
 */
class faqtiController extends Controller
{
    /**
     * Lists all faqti entities.
     *
     * @Route("/", name="faqti_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $faqtis = $em->getRepository('AppBundle:faqti')->findAll();

        return $this->render('faqti/index.html.twig', array(
            'faqtis' => $faqtis,
        ));
    }

    /**
     * Creates a new faqti entity.
     *
     * @Route("/new", name="faqti_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $faqti = new Faqti();
        $form = $this->createForm('AppBundle\Form\faqtiType', $faqti);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($faqti);
            $em->flush();

            return $this->redirectToRoute('faqti_show', array('id' => $faqti->getId()));
        }

        return $this->render('faqti/new.html.twig', array(
            'faqti' => $faqti,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a faqti entity.
     *
     * @Route("/{id}", name="faqti_show")
     * @Method("GET")
     */
    public function showAction(faqti $faqti)
    {
        $deleteForm = $this->createDeleteForm($faqti);

        return $this->render('faqti/show.html.twig', array(
            'faqti' => $faqti,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing faqti entity.
     *
     * @Route("/{id}/edit", name="faqti_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, faqti $faqti)
    {
        $deleteForm = $this->createDeleteForm($faqti);
        $editForm = $this->createForm('AppBundle\Form\faqtiType', $faqti);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('faqti_show', array('id' => $faqti->getId()));
        }

        return $this->render('faqti/edit.html.twig', array(
            'faqti' => $faqti,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a faqti entity.
     *
     * @Route("/{id}", name="faqti_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, faqti $faqti)
    {
        $form = $this->createDeleteForm($faqti);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($faqti);
            $em->flush();
        }

        return $this->redirectToRoute('faqti_index');
    }

    /**
     * Creates a form to delete a faqti entity.
     *
     * @param faqti $faqti The faqti entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(faqti $faqti)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('faqti_delete', array('id' => $faqti->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
