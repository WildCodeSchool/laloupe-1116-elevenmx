<?php

namespace ElevenmxBundle\Controller;

use ElevenmxBundle\Entity\Commentaire;
use ElevenmxBundle\Entity\Projet;
use ElevenmxBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Variable;
use Symfony\Component\HttpFoundation\Request;

use ElevenmxBundle\Form\RechercheType;

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

        //$projets = $em->getRepository('ElevenmxBundle:Projet')->findAll();
        $user= $this->get('security.context')->getToken()->getUser();
        $projets = $em->getRepository('ElevenmxBundle:Projet')->findBy(
            array('user' => $user)//je sélect les projets dont le code client = user
        );

        return $this->render('ElevenmxBundle:projet:index.html.twig', array(
            'projets' => $projets,
        ));
    }

    /**
     * Lists all projet entities.
     *
     */
    public function indexGraphAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projets = $em->getRepository('ElevenmxBundle:Projet')->findAll();
        //$projets = $em->getRepository('ElevenmxBundle:Projet')->findBy(
        //    array('projet' => $projet->getId()),
        //);

        return $this->render('ElevenmxBundle:projet:indexGraph.html.twig', array(
            'projets' => $projets,
        ));
    }


    public function indexHistoAction()
    {
        $em = $this->getDoctrine()->getManager();

        $projets = $em->getRepository('ElevenmxBundle:Projet')->findBy(
            array('status' => 'Projet terminé')//chercher par tableau status terminé  littéralement
        );

        return $this->render('ElevenmxBundle:projet:indexHisto.html.twig', array(
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
        $em = $this->getDoctrine()->getManager();
        $gestionstatus = $em->getRepository('ElevenmxBundle:Gestionstatus')->findOneBy(array('statut' => 'Attente d\'information'));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $projet->setStatus($gestionstatus);
            $em->persist($projet);
            $em->flush($projet);

            return $this->redirectToRoute('projet_editGraph', array('id' => $projet->getId()));
        }

        return $this->render('ElevenmxBundle:projet:new.html.twig', array(
            'projet' => $projet,
            'form' => $form->createView(),
            'gestionstatus' => $gestionstatus,
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

        $gestionstatuss = $em->getRepository('ElevenmxBundle:Gestionstatus')->findAll();

        $gestionstatus1 = $em->getRepository('ElevenmxBundle:Gestionstatus')->findOneBy(array('statut' => 'Maquette a faire'));

        $newCommentaire = new Commentaire();
        $form = $this->createForm('ElevenmxBundle\Form\CommentaireType', $newCommentaire);
        $form->handleRequest($request);

        $var_idstatus = 0;
        foreach ($gestionstatuss as $gestionstatus){

            if ($gestionstatus->getStatut() ==  'Maquette a faire'){
                $var_idstatus = $gestionstatus->getId();
            }
        }

        if ($form->isSubmitted() && $form->isValid()){

            $newCommentaire->setProjet($projet);
            $newCommentaire->setAffectation('client');
            $em->persist($newCommentaire);

            $var_id = 0;
            foreach ($commentaires as $commentaire){
                $var_id = $commentaire->getId();
                if ($var_id <  $commentaire->getId()){
                    $var_id = $commentaire->getId();
                    $var_affectation = $commentaire->getaffectation();
                }
            }

            if ($projet->getStatus() == 'Attente d\'information' && $var_id == 0){
                $projet->setStatus($gestionstatus1);
                $em->persist($projet);
            } elseif ( $projet->getStatus() == 'Maquette en attente de validation' && $var_affectation == 'graphiste'){
                $projet->setStatus($gestionstatus1);
                $em->persist($projet);
            }else {}

            $em->flush();

            return $this->redirectToRoute('projet_show', array('id' => $projet->getId()));
        }

        return $this->render('@Elevenmx/projet/show.html.twig', array(
            'var_idstatus' => $var_idstatus,
            'comment' => $commentaires,
            'gestionstatuss' => $gestionstatuss,
            'gestionstatus1' => $gestionstatus1,
            'form' => $form->createView(),
            'projet' => $projet,
        ));
    }


    public function showGraphAction(Projet $projet, Request $request)
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
            $newCommentaire->setAffectation('graphiste');
            $em->persist($newCommentaire);
            $form->get('projet.status')->getData();

            $em->flush();

            // ******************************* envoi de mail auto quand graph met a jour le statut **********************************
            $user = new User();

            $message = \Swift_Message::newInstance()
                ->setSubject('Mise à jour de votre projet')
                ->setFrom('javadescavernes38@gmail.com')
                ->setTo('javadescavernes38@gmail.com')
                ->setBody(
                    $this->renderView(
                        'Emails/registrationAuto.html.twig',
                        array('user' => $user)
                    )
                );
            $this->get('mailer')->send($message);

            return $this->redirectToRoute('projet_showGraph', array('id' => $projet->getId()));
        }
        // ******************************** fin d'envoi de mail auto quand graph met a jour le statut *******************************

        return $this->render('@Elevenmx/projet/showGraph.html.twig', array(
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
die();

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
     * Displays a form to edit an existing projet entity.
     *
     */
    public function editGraphAction(Request $request, Projet $projet)
    {
        $em = $this->getDoctrine()->getManager();
        $gestionstatuss = $em->getRepository('ElevenmxBundle:Gestionstatus')->findAll();
        $var_new_status=0;
        $gestionstatus1 = $em->getRepository('ElevenmxBundle:Gestionstatus')->findOneBy(array('id' => $var_new_status));

        $var_idstatus = 0;
        $var_idprojet = 0;

        foreach ($gestionstatuss as $gestionstatus){
            if ($gestionstatus->getStatut() ==  $projet->getStatus()){
                $var_idstatus = $projet->getStatus();
            }
        }

        $editForm = $this->createForm('ElevenmxBundle\Form\ProjetType', $projet);
        $editForm->handleRequest($request);

        $form1 = $this->createForm('ElevenmxBundle\Form\ProjetType', $projet);
        $form1->handleRequest($request);

        $commentaires = $em->getRepository('ElevenmxBundle:Commentaire')->findBy(
            array('projet' => $projet->getId()),
            array('id' => 'DESC')
        );

        $newCommentaire = new Commentaire();
        $form = $this->createForm('ElevenmxBundle\Form\CommentaireType', $newCommentaire);
        $form->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $projet->setStatus($projet->getStatus());
            $em->flush();
            //$this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projet_editGraph', array('id' => $projet->getId()));
        }

        if ($form1->isSubmitted() ) {

//            $var_idprojet =$projet->getId();
//            $var_new_status=$projet->getStatus();
//
//            $gestionstatus1 = $em->getRepository('ElevenmxBundle:Gestionstatus')->findOneBy(array('id' => $var_new_status));
//            $projet->setStatus($gestionstatus1);

           $em->persist($projet);
           /* $em->flush();*/


        }

        if ($form->isSubmitted() && $form->isValid()) {

            $newCommentaire->setProjet($projet);
            $newCommentaire->setAffectation('graphiste');
            $em->persist($newCommentaire);

            $vartest = $projet->getStatus();

            //$projet->setTitreProjet('projet8');
            $projet->setStatus($vartest);

            $em->flush();
            return $this->redirectToRoute('projet_editGraph', array('id' => $projet->getId()));
        }

        return $this->render('ElevenmxBundle:projet:editGraph.html.twig', array(
            '$var_idstatus' => $var_idstatus,
            '$var_new_status' => $var_new_status,
            'var_idprojet' => $var_idprojet,
            '$gestionstatus1' => $gestionstatus1,
            '$gestionstatuss' => $gestionstatuss,
            'projet' => $projet,
            'form' => $form->createView(),
            'form1' => $form1->createView(),
            'edit_form' => $editForm->createView(),
            'comment' => $commentaires,

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
