<?php

namespace ElevenmxBundle\Controller;

use ElevenmxBundle\Entity\NouveauGraphiste;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Nouveaugraphiste controller.
 *
 */
class NouveauGraphisteController extends Controller
{
    /**
     * Lists all nouveauGraphiste entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $nouveauGraphistes = $em->getRepository('ElevenmxBundle:NouveauGraphiste')->findAll();

        return $this->render('ElevenmxBundle:nouveaugraphiste:index.html.twig', array(
            'nouveauGraphistes' => $nouveauGraphistes,
        ));
    }

    /**
     * Creates a new nouveauGraphiste entity.
     *
     */
    public function newAction(Request $request)
    {
        $nouveauGraphiste = new Nouveaugraphiste();
        $form = $this->createForm('ElevenmxBundle\Form\NouveauGraphisteType', $nouveauGraphiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nouveauGraphiste);
            $em->flush($nouveauGraphiste);

            return $this->redirectToRoute('nouveaugraphiste_show', array('id' => $nouveauGraphiste->getId()));
        }

        return $this->render('ElevenmxBundle:nouveaugraphiste:new.html.twig', array(
            'nouveauGraphiste' => $nouveauGraphiste,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a nouveauGraphiste entity.
     *
     */
    public function showAction(NouveauGraphiste $nouveauGraphiste)
    {
        $deleteForm = $this->createDeleteForm($nouveauGraphiste);

        return $this->render('ElevenmxBundle:nouveaugraphiste:show.html.twig', array(
            'nouveauGraphiste' => $nouveauGraphiste,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing nouveauGraphiste entity.
     *
     */
    public function editAction(Request $request, NouveauGraphiste $nouveauGraphiste)
    {
        $deleteForm = $this->createDeleteForm($nouveauGraphiste);
        $editForm = $this->createForm('ElevenmxBundle\Form\NouveauGraphisteType', $nouveauGraphiste);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nouveaugraphiste_edit', array('id' => $nouveauGraphiste->getId()));
        }

        return $this->render('ElevenmxBundle:nouveaugraphiste:edit.html.twig', array(
            'nouveauGraphiste' => $nouveauGraphiste,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a nouveauGraphiste entity.
     *
     */
    public function deleteAction(Request $request, NouveauGraphiste $nouveauGraphiste)
    {
        $form = $this->createDeleteForm($nouveauGraphiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nouveauGraphiste);
            $em->flush($nouveauGraphiste);
        }

        return $this->redirectToRoute('nouveaugraphiste_index');
    }

    /**
     * Creates a form to delete a nouveauGraphiste entity.
     *
     * @param NouveauGraphiste $nouveauGraphiste The nouveauGraphiste entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NouveauGraphiste $nouveauGraphiste)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nouveaugraphiste_delete', array('id' => $nouveauGraphiste->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
