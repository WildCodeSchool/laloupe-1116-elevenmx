<?php

namespace ElevenmxBundle\Controller;

use ElevenmxBundle\Entity\Gestionstatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Gestionstatus controller.
 *
 */
class GestionstatusController extends Controller
{
    /**
     * Lists all gestionstatus entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gestionstatuses = $em->getRepository('ElevenmxBundle:Gestionstatus')->findAll();

        return $this->render('ElevenmxBundle:gestionstatus:index.html.twig', array(
            'gestionstatuses' => $gestionstatuses,
        ));
    }

    /**
     * Creates a new gestionstatus entity.
     *
     */
    public function newAction(Request $request)
    {
        $gestionstatus = new Gestionstatus();
        $form = $this->createForm('ElevenmxBundle\Form\GestionstatusType', $gestionstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gestionstatus);
            $em->flush($gestionstatus);

            return $this->redirectToRoute('gestionstatus_show', array('id' => $gestionstatus->getId()));
        }

        return $this->render('ElevenmxBundle:gestionstatus:new.html.twig', array(
            'gestionstatus' => $gestionstatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gestionstatus entity.
     *
     */
    public function showAction(Gestionstatus $gestionstatus)
    {
        $deleteForm = $this->createDeleteForm($gestionstatus);

        return $this->render('ElevenmxBundle:gestionstatus:show.html.twig', array(
            'gestionstatus' => $gestionstatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gestionstatus entity.
     *
     */
    public function editAction(Request $request, Gestionstatus $gestionstatus)
    {
        $deleteForm = $this->createDeleteForm($gestionstatus);
        $editForm = $this->createForm('ElevenmxBundle\Form\GestionstatusType', $gestionstatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gestionstatus_edit', array('id' => $gestionstatus->getId()));
        }

        return $this->render('ElevenmxBundle:gestionstatus:edit.html.twig', array(
            'gestionstatus' => $gestionstatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gestionstatus entity.
     *
     */
    public function deleteAction(Request $request, Gestionstatus $gestionstatus)
    {
        $form = $this->createDeleteForm($gestionstatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gestionstatus);
            $em->flush($gestionstatus);
        }

        return $this->redirectToRoute('gestionstatus_index');
    }

    /**
     * Creates a form to delete a gestionstatus entity.
     *
     * @param Gestionstatus $gestionstatus The gestionstatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Gestionstatus $gestionstatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gestionstatus_delete', array('id' => $gestionstatus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
