<?php

namespace ElevenmxBundle\Controller;

use ElevenmxBundle\Form\UserType;
use ElevenmxBundle\Entity\User;
use ElevenmxBundle\Entity\Mail;
use ElevenmxBundle\Repository\MailRepository;
use ElevenmxBundle\ElevenmxBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use  Symfony\Component\Form\ResolvedFormTypeInterface;
use Symfony\Component\Form\Form;

class DefaultController extends Controller
{
    public function indexAction()
    {
        // debut test
        $em = $this->getDoctrine()->getManager();
        $userActif = $this->getUser();
        if (!$userActif){
//            echo ('Pas connecté !');
            return $this->redirectToRoute("fos_user_security_login");
        } elseif ($userActif->hasRole('ROLE_SUPER_ADMIN')) {
            echo ('Soupppppppppppeeeeeeeeeeeeeeeeeeer Admin !');
        } elseif ($userActif->hasRole('ROLE_ADMIN')) {
            echo ('team Admin...');
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
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $message = \Swift_Message::newInstance()
                ->setSubject('hello mail')
                ->setFrom('javadescavernes38@gmail.com')
                ->setTo('javadescavernes38@gmail.com')
                ->setBody(
                    $this->renderView(
                        'Emails/registration.html.twig',
                        array('user' => $user)
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



    // ******************************** fin d'envoi de mail et bdd ****************************************************












            /* $message = \Swift_Message::newInstance('Test')
                 ->setSubject($Subject)
                 ->setFrom('javadescavernes38@gmail.com')
                 ->setTo('javadescavernes38@gmail.com')
                 ->setBody($body);

             $this->get('mailer')->send($message);

             return $this->render('ElevenmxBundle:Default:formMail.html.twig');*/





        // fin envoi BDD ******************************************************

     /*   $Request = $this->getRequest();
        if ($Request->getMethod() == "POST") {
            $Subject = $Request->get("Subject");
            $message = $Request->get("message") . " " . $Request->get("Nom") . " " . $Request->get("Prénom") . " " . $Request->get("mail") . " " . $Request->get("Téléphone") . " " . $Request->get("Entreprise") . " " . $Request->get("Login") . " " . $Request->get("Password");



            $message = \Swift_Message::newInstance('Test')
                ->setSubject('Votre inscription ElevenMx')
                ->setFrom('javadescavernes38@gmail.com')
                ->setTo('javadescavernes38@gmail.com')
                ->setBody($message);
            $this->get('mailer')->send($message);


            return $this->render('ElevenmxBundle:Default:formMail.html.twig');

        }
        return array(
            'form' => $form->createView()
        );*/





    // ******************************** fin d'envoi de mail ****************************************************



    // ******************************** Debut Bloc redirection *************************************************




    // ******************************** Fin Bloc redirection *************************************************



}
