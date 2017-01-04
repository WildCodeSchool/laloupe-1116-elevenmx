<?php

namespace ElevenmxBundle\Controller;

use ElevenmxBundle\Entity\Commentaire;
use ElevenmxBundle\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Projet controller.
 *
 */
class ProjetController extends Controller
{
    /**
     * Lists all projet entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projets = $em->getRepository('ElevenmxBundle:Projet')->findAll();

        return $this->render('ElevenmxBundle:projet:index.html.twig', array(
            'projets' => $projets,
        ));
    }

    /**
     * Creates a new projet entity.
     *
     */
    public function newAction(Request $request)
    {
        $projet = new Projet();
        $form = $this->createForm('ElevenmxBundle\Form\ProjetType', $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $projet->setStatus('Attente d\'information');
            $em = $this->getDoctrine()->getManager();
            $em->persist($projet);
            $em->flush($projet);

            return $this->redirectToRoute('graphiste_new', array('id' => $projet->getId()));
        }

        return $this->render('ElevenmxBundle:projet:new.html.twig', array(
            'projet' => $projet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a projet entity.
     *
     */
    public function showAction(Projet $projet, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $commentaires = $em->getRepository('ElevenmxBundle:Commentaire')->findBy(
            array('projet' => $projet->getId()),
            array('id' => 'DESC')
        );

        $newCommentaire = new Commentaire();
        $form = $this->createForm('ElevenmxBundle\Form\CommentaireType', $newCommentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $newCommentaire->setProjet($projet);
            $em->persist($newCommentaire);
            $em->flush();

            return $this->redirectToRoute('projet_show', array('id' => $projet->getId()));
        }

        return $this->render('@Elevenmx/projet/show.html.twig', array(
            'comment' => $commentaires,
            'form' => $form->createView(),
            'projet' => $projet,
        ));
    }

    /**
     * Displays a form to edit an existing projet entity.
     *
     */
    public function editAction(Request $request, Projet $projet)
    {
        $deleteForm = $this->createDeleteForm($projet);
        $editForm = $this->createForm('ElevenmxBundle\Form\ProjetType', $projet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projet_edit', array('id' => $projet->getId()));
        }

        return $this->render('ElevenmxBundle:projet:edit.html.twig', array(
            'projet' => $projet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a projet entity.
     *
     */
    public function deleteAction(Request $request, Projet $projet)
    {
        $form = $this->createDeleteForm($projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($projet);
            $em->flush($projet);
        }

        return $this->redirectToRoute('projet_index');
    }

    /**
     * Creates a form to delete a projet entity.
     *
     * @param Projet $projet The projet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Projet $projet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('projet_delete', array('id' => $projet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
