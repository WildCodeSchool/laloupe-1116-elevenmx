<?php

namespace ElevenmxBundle\Controller;

use ElevenmxBundle\Form\UserType;
use ElevenmxBundle\Entity\User;
use ElevenmxBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {
        // debut test
        $em = $this->getDoctrine()->getManager();
        $userActif = $this->getUser();
        if (!$userActif) {
//            echo ('Pas connecté !');
            return $this->redirectToRoute("fos_user_security_login");
        } elseif ($userActif->hasRole('ROLE_SUPER_ADMIN')) {
            echo('Soupppppppppppeeeeeeeeeeeeeeeeeeer Admin !');
        } elseif ($userActif->hasRole('ROLE_ADMIN')) {
            echo('team Admin...');
        } elseif ($userActif->hasRole('ROLE_GRAPH')) {
            return $this->redirectToRoute("graphiste_index");
//            http_redirect("bundle/graphiste/index.htlm.twig");
        } else {
            return $this->redirectToRoute('projet_index');
        }

        return $this->render('ElevenmxBundle:Default:index.html.twig');
    }

    public function redirectionAction()
    {
        return $this->render('ElevenmxBundle:Default:formMail.html.twig');
    }

// ******************************* envoi de mail et bdd **********************************
    public function sendMailAction()
    {
        $request = $this->get('request');
        $user = new User();
        $form = $this->createForm(new UserType(), $user);


        // modification pour avoir un id 1 dans categorie -> DOIT valider l'user dans php my admin...

        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('ElevenmxBundle:Categorie')->findOneBy(array('id' => '1'));
        $user->setCategorie($categorie);
        $form->handleRequest($request);

        $user->setEnabled(1);

        $categorie = $form->get('categorie')->getData();
        if ($categorie == 'client') {
            $user->setRoles(array('ROLE_USER'));
        } elseif ($categorie == 'admin') {
            $user->setRoles(array('ROLE_ADMIN'));
        } else {
            $user->setRoles(array('ROLE_GRAPH'));
        }
        $plainpassword = $form->get('plain_password')->getData();


        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $message = \Swift_Message::newInstance()
                ->setSubject('hello mail')
                ->setFrom('javadescavernes38@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        'Emails/registration.html.twig',
                        array('user' => $user, 'plainpassword' => $plainpassword)
                    )
                );
            $this->get('mailer')->send($message);
            return $this->render('ElevenmxBundle:Default:formMail.html.twig', array(
                'form' => $form->createView()
            ));
        }
        return $this->render('ElevenmxBundle:Default:formMail.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
    // ******************************** fin d'envoi de mail et bdd ****************************************************




