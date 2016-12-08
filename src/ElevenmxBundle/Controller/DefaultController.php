<?php

namespace ElevenmxBundle\Controller;

use ElevenmxBundle\ElevenmxBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
            echo ('client');
        }

        return $this->render('ElevenmxBundle:Default:index.html.twig');
    }

    public function redirectionAction()
    {
        return $this->render('ElevenmxBundle:Default:formMail.html.twig');
    }
// ******************************* envoi de mail **********************************
    public function sendMailAction()
    {

        $Request = $this->getRequest();
        if ($Request->getMethod() == "POST") {
            $Subject = $Request->get("Subject");
            $message = $Request->get("message") . " Bonjour patate" . $Request->get("Nom") . " " . $Request->get("Prénom") . " " . $Request->get("Mail") . " " . $Request->get("Téléphone") . " " . $Request->get("Entreprise") . " " . $Request->get("Login") . " " . $Request->get("Password");



            $message = \Swift_Message::newInstance('Test')
                ->setSubject($Subject)
                ->setFrom('javadescavernes38@gmail.com')
                ->setTo('javadescavernes38@gmail.com')
                ->setBody($message);
            $this->get('mailer')->send($message);


            return $this->render('ElevenmxBundle:Default:formMail.html.twig');

        }
        return $this->render('ElevenmxBundle:Default:formMail.html.twig');

    }

    // ******************************** fin d'envoi de mail ****************************************************



    // ******************************** Debut Bloc redirection *************************************************




    // ******************************** Fin Bloc redirection *************************************************



}
