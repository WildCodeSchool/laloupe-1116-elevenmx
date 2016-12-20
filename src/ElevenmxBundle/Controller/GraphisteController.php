<?php

namespace ElevenmxBundle\Controller;

use ElevenmxBundle\Entity\Graphiste;
use ElevenmxBundle\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Graphiste controller.
 *
 */
class GraphisteController extends Controller
{
    /**
     * Lists all graphiste entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $graphistes = $em->getRepository('ElevenmxBundle:Graphiste')->findAll();

        return $this->render('ElevenmxBundle:graphiste:index.html.twig', array(
            'graphistes' => $graphistes,
        ));
    }

    /**
     * Creates a new graphiste entity.
     *
     */
    public function newAction(Request $request)
    {
        $graphiste = new Graphiste();
        $form = $this->createForm('ElevenmxBundle\Form\GraphisteType', $graphiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($graphiste);
            $em->flush($graphiste);

            return $this->redirectToRoute('graphiste_show', array('id' => $graphiste->getId()));
        }

        return $this->render('ElevenmxBundle:graphiste:new.html.twig', array(
            'graphiste' => $graphiste,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a graphiste entity.
     *
     */
    public function showAction(Graphiste $graphiste)
    {
        $deleteForm = $this->createDeleteForm($graphiste);

        return $this->render('ElevenmxBundle:graphiste:show.html.twig', array(
            'graphiste' => $graphiste,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing graphiste entity.
     *
     */
    public function editAction(Request $request, Graphiste $graphiste)
    {
        $deleteForm = $this->createDeleteForm($graphiste);
        $editForm = $this->createForm('ElevenmxBundle\Form\GraphisteType', $graphiste);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('graphiste_edit', array('id' => $graphiste->getId()));
        }

        return $this->render('ElevenmxBundle:graphiste:edit.html.twig', array(
            'graphiste' => $graphiste,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
        
    }

    /**
     * Deletes a graphiste entity.
     *
     */
    public function deleteAction(Request $request, Graphiste $graphiste)
    {
        $form = $this->createDeleteForm($graphiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($graphiste);
            $em->flush($graphiste);
        }

        return $this->redirectToRoute('graphiste_index');
    }

    /**
     * Creates a form to delete a graphiste entity.
     *
     * @param Graphiste $graphiste The graphiste entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Graphiste $graphiste)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('graphiste_delete', array('id' => $graphiste->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    public function listProjAction()
    {
        # renvoi vers listProj.html.twig
        /**
         * @Route("/")
         */

        $em = $this->getDoctrine()->getManager();
        $graphistes = $em->getRepository('ElevenmxBundle:Graphiste')->findAll();
        $emP = $this->getDoctrine()->getManager();
        $projets = $emP->getRepository('ElevenmxBundle:Projet')->findAll();

        return $this->render('ElevenmxBundle:graphiste:listProj.html.twig', array(
            'graphistes' => $graphistes,
            'projets' => $projets,
        ));
    }

    public function detailProjAction()
    {
        # renvoi vers detailtProj.html.twig
        /**
         * @Route("/")
         */

//        $em = $this->getDoctrine()->getManager();
//        $graphistes = $em->getRepository('ElevenmxBundle:Graphiste')->find($id);

        $emD = $this->getDoctrine()->getManager();
        $projets = $emD->getRepository('ElevenmxBundle:Projet')->findAll();

        return $this->render('ElevenmxBundle:graphiste:detailProj.html.twig', array(
//            'graphistes' => $graphistes,
            'projets' => $projets,
        ));
    }
}
